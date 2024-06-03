<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Builder;


use Illuminate\Support\Facades\Mail;
use App\Mail\MailAlert;

class AdminUserController extends Controller
{
    //--------------------------------- General functions -------------------------

    public function generateRandomString() 
    {
        $length=rand(8, 9);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) 
        {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }


    //-------------------------------------   User  par  admin -------------------------

    public function adminShowUsers()
    {
        
        $users=\App\Models\User::where('actif','oui')->with('roles')->get();
      	$actifSelected="oui";
        return view('admin.adminShowUsers',compact('users','actifSelected'));
    }
    
    public function adminShowUsersPost(Request $request)
    {
        if ($request->isactif=="tous")
            $users=\App\Models\User::with('roles')->get();
        else
            $users=\App\Models\User::where('actif',$request->isactif)->with('roles')->get();
        $actifSelected=$request->isactif;
        return view('admin.adminShowUsers',compact('users','actifSelected'));
    }

    public function adminAddUser()
    {
    	$roles=\App\Models\Role::all();
        return view('admin.adminAddUser',compact('roles'));
    }

    public function adminAddUserPost(Request $request)
    {

        //test d'unicité du EMAIL et REF
        $userSameEmail=\App\Models\User::where('email',strtolower($request->email))->first();
        if (isset($userSameEmail))
        {
            return redirect()->back()->with('ErrorMessage','Email existe déjà');
        }

        //test d'unicité du CIN
        if ($request->cin<>null) 
        {
            $userSameCIN=\App\Models\User::where('cin',$request->cin)->first();

            if (isset($userSameCIN))
                return redirect()->back()->with('ErrorMessage','CIN existe déjà');
        }

        

        $user= new \App\Models\User();

        $user->nom=$request['nom'];
        $user->prenom=$request['prenom'];
        $user->email=strtolower($request['email']);
    	$user->emailvalide=$request->emailvalide;
        $user->password=\Hash::make($request['password']);
        
        $user->fonction=$request['fonction'];
   

        $user->actif=$request['actif'];
        
        $user->tel=$request['tel'];

        $user->cin=$request['cin'];
       
       
    	$user->save();

    	
        $user->roles()->sync($request->roles);

       

        

    	return redirect()->route('adminShowUsers')->with('SuccessMessage','Employé ajouté avec succès ');
    }

    public function adminEditUser($id)
    {
    	$user=\App\Models\User::with('roles')->where('id',$id)->first();
    	$roles=\App\Models\Role::all();
        return view('admin.adminEditUser',compact('user','roles'));
    }

    public function adminEditUserPost(Request $request)
    {
    	
        $user=\App\Models\User::where('id',$request->id)->first();

        //Tests pour valider la modification
        //test d'unicité du mail et ref(matricule)
        $userSameEmail=\App\Models\User::where('email',strtolower($request->email))->where('email','<>',$user->email)->first();
      
        if (isset($userSameEmail))
        {
            return redirect()->back()->with('ErrorMessage','Email existe déjà');
        }

        //test d'unicité du CIN
        if ($request->cin<>null) 
        {
            $userSameCIN=\App\Models\User::where('cin',$request->cin)->where('cin','<>',$user->cin)->first();

            if (isset($userSameCIN))
                return redirect()->back()->with('ErrorMessage','CIN existe déjà');
        }

        

        //-----Modification permise
        // Actions associées à la modification nécessires avant changement du $request



        //verifications des alertes
        //tester le cas ou le user est devenu inactif => enlever l'alerte
        if ($user->actif=="oui" and $request->actif=="non")
            \App\Models\Alert::where('categorie','Contrats')->where('element_id',$user->id)->delete();
            
        

        //Alertes de securite
        //chaque changement doit etre dans une condition a part (en cas de changement de plusieurs colonnes en meme temps)
       
        if ($user->actif<>$request->actif)
        {
            $securite= new \App\Models\Securite();
            $securite->date=\Carbon\Carbon::now();
            $securite->niveau="moyen";
            $securite->type="Edition";
            $securite->alerte=" ";
            $securite->user_id=\Auth::user()->id;
            $securite->nomtable="users";
            $securite->nomelement="actif";
            $securite->element=$user->name."(".$user->ref.")";
            $securite->ancien=$user->actif;
            $securite->nouveau=$request->actif;

            $securite->save();
        }


        if ($user->nom<>$request->nom)
        {
            $securite= new \App\Models\Securite();
            $securite->date=\Carbon\Carbon::now();
            $securite->niveau="moyen";
            $securite->type="Edition";
            $securite->alerte=" ";
            $securite->user_id=\Auth::user()->id;
            $securite->nomtable="users";
            $securite->nomelement="Nom";
            $securite->element=$user->nom."(".$user->ref.")";
            $securite->ancien=$user->nom;
            $securite->nouveau=$request->nom;

            $securite->save();
        }

        //-- Mise a jour des données 

        $user->nom=$request['nom'];
        $user->prenom=$request['prenom'];
        $user->grade=$request['grade'];
        $user->domainederecherche=$request['domainederecherche'];
    	$user->email=strtolower($request['email']);
        $user->emailvalide=$request->emailvalide;
        $user->fonction=$request['fonction'];
        if ($user->actif=="oui" and $request->actif=="non")
        {
            //changer le mot de passe en aleatoire 
            //pour forcer le retour vers l'administrateur en cas de reactivation du compte
            $user->password=\Hash::make(uniqid());
        }
        else
            if ($request['password']<>"") $user->password=\Hash::make($request['password']);
        
        $user->actif=$request['actif'];
       
        $user->tel=$request['tel'];
        
        $user->cin=$request['cin'];
       
       $user->update();


       

    	$user->roles()->sync($request->roles);
      

        
        
    	return redirect()->route('adminShowUsers')->with('SuccessMessage','Employé mis à jour avec succès ');
    }

    public function adminDeleteUser($id)
    {
    	$user=\App\Models\User::find($id);
    	return view('admin.adminDeleteUser',compact('user'));
    }

    public function adminDeleteUserPost(Request $request)
    {
    	
    	$user=\App\Models\User::where('id',$request->id)->first();
        $user->delete();

    	return redirect()->route('adminShowUsers');
    }

    	



//-------------------------------------   Role    -------------------------

    public function adminShowRoles()
    {
    	$roles=\App\Models\Role::all();
      	return view('admin.adminShowRoles',compact('roles'));
    }

    public function adminAddRole()
    {
    	return view('admin.adminAddRole');
    }

    public function adminAddRolePost(Request $request)
    {
    	$role= new \App\Models\Role();
    	$role->name=$request['name'];
    	$role->display_name=$request['display_name'];
    	$role->description=$request['description'];
        $role->categorie=$request['categorie'];
        $role->ordre=$request['ordre'];
    	$role->save();

    	return redirect()->route('adminShowRoles');
    }

    public function adminEditRole($id)
    {
    	$role=\App\Models\Role::where('id',$id)->first();
    	return view('admin.adminEditRole',compact('role'));
    }

    public function adminEditRolePost(Request $request)
    {
    	
    	$role=\App\Models\Role::where('id',$request->id)->first();
    	//$role->name=$request['name'];
    	$role->display_name=$request['display_name'];
    	$role->description=$request['description'];
        $role->categorie=$request['categorie'];
        $role->ordre=$request['ordre'];
    	$role->update();

    	return redirect()->route('adminShowRoles');
    }

    public function adminDeleteRole($id)
    {
    	$role=\App\Models\Role::find($id);
        $UsersHasRole=\App\Models\User::whereRoleIs([$role->name])->get();
    	return view('admin.adminDeleteRole',compact('role','UsersHasRole'));
    }

    public function adminDeleteRolePost(Request $request)
    {
    	
    	$role=\App\Models\Role::where('id',$request->id)->first();
    	$role->delete();

    	return redirect()->route('adminShowRoles');
    }


//-------------------------------------   Adminmessages    -------------------------



    public function adminShowAdminmessages()
    {
        $messages=\App\Models\Adminmessage::orderBy('datemessage','desc')->get();
        return view('admin.adminShowAdminmessages',compact('messages'));
    }

    public function adminShowAdminmessage($id)
    {
        $message=\App\Models\Adminmessage::
            with('adminmessagesusers',
                 'adminmessagesusers.user:id,nom,fonction')
            ->find($id);
        
        $users_ViewedMessage_ids=[];
        if (isset($message->adminmessagesusers))
            $users_ViewedMessage_ids=$message->adminmessagesusers->pluck('user_id')->toArray();

        $users_DidNotViewedMessage=\App\Models\User::
              select('id','nom','fonction')
            ->where('actif','oui')
            ->whereNotIn('id',$users_ViewedMessage_ids)
            ->get();

        return view('admin.adminShowAdminmessage',compact('message','users_DidNotViewedMessage'));
    }

    public function adminAddAdminmessage()
    {
        return view('admin.adminAddAdminmessage');
    }

    public function adminAddAdminmessagePost( Request $request)
    {
        if (strlen($request->message_en)>65000)
            return redirect()->back()->with('ErrorMessage','Message (formaté) en anglais est trop long');
        if (strlen($request->message_fr)>65000)
            return redirect()->back()->with('ErrorMessage','Message (formaté) en français est trop long');
        
        $message = new \App\Models\Adminmessage();
        $message->titre=$request->titre;
        $message->message_fr=$request->message_fr;
        $message->message_en=$request->message_en;
        $message->datemessage=$request->datemessage;
        $message->etat="En cours de préparation";
        $message->save();

        return redirect()->route('adminShowAdminmessages')->with('SuccessMessage','Message ajouté avec succès');
    }


    public function adminEditAdminmessage($id)
    {
        $message=\App\Models\Adminmessage::find($id);
        return view('admin.adminEditAdminmessage',compact('message'));
    }

    public function adminEditAdminmessagePost(Request $request)
    {
        if (strlen($request->message_en)>65000)
            return redirect()->back()->with('ErrorMessage','Message (formaté) en anglais est trop long');
        if (strlen($request->message_fr)>65000)
            return redirect()->back()->with('ErrorMessage','Message (formaté) en français est trop long');
         
        $message = \App\Models\Adminmessage::find($request->id);
        $message->titre=$request->titre;
        $message->message_fr=$request->message_fr;
        $message->message_en=$request->message_en;
        $message->datemessage=$request->datemessage;
        $message->etat=$request->etat;
        $message->update();

        return redirect()->route('adminShowAdminmessages')->with('SuccessMessage','Message ajouté avec succès');
    }

    public function adminDeleteAdminmessage($id)
    {
        $message=\App\Models\Adminmessage::find($id);
        return view('admin.adminDeleteAdminmessage',compact('message'));
    }

    public function adminDeleteAdminmessagePost(Request $request)
    {
        $message=\App\Models\Adminmessage::find($request->id);
        $message->delete();
        return redirect()->route('adminShowAdminmessages')->with('SuccessMessage','Le message a été supprimé avec succès');
    }

    public function adminDiffuseAdminmessage($id)
    {
        $message=\App\Models\Adminmessage::find($id);
        return view('admin.adminDiffuseAdminmessage',compact('message'));
    }

    public function adminDiffuseAdminmessagePost(Request $request)
    {
        $message=\App\Models\Adminmessage::find($request->id);
        $message->etat="Diffusé";
        $message->datemessage=date('Y-m-d');

        $message->update();
        return redirect()->route('adminShowAdminmessages')->with('SuccessMessage','Message diffusé avec succès');
    }

    public function adminAnnuleAdminmessage($id)
    {
        $message=\App\Models\Adminmessage::find($id);
        return view('admin.adminAnnuleAdminmessage',compact('message'));
    }

    public function adminAnnuleAdminmessagePost(Request $request)
    {
        $message=\App\Models\Adminmessage::find($request->id);
        $message->etat="Annulé";
        $message->update();

        return redirect()->route('adminShowAdminmessages')->with('SuccessMessage','Message annulé.');
    }
    
    public function MarkUserAsReadMessagePost(Request $request)
    {
        $adminmessagesuser = new \App\Models\Adminmessagesuser();
        $adminmessagesuser->adminmessage_id=$request->id;
        $adminmessagesuser->user_id=\Auth::user()->id;
        $adminmessagesuser->dateconfirmation=now();
        $adminmessagesuser->save();

        return redirect()->route('dashboard');
    }



    //--------- mails


public function adminShowAdminmails()
    {
        $mails=\App\Models\Mailenvoye::orderBy('date_envoi','desc')->get();
        return view('admin.adminShowAdminmails',compact('mails'));
    }

    public function adminShowAdminmail($id)
    {
        $mail=\App\Models\Mailenvoye::find($id);
        $receivers=array_chunk(explode(';',$mail->receivers),3);
        
        $ids = array_column($receivers, 0);
        $mails= array_column($receivers, 2);

        
        $users=\App\Models\User::select('id','name','fonction')
            ->whereIn('id',$ids)
            ->get();

        return view('admin.adminShowAdminmail',compact('mail','users','mails'));
    }

    public function adminAddAdminmail()
    {
        $users=\App\Models\User::select('id','name','fonction')
            ->where('actif','oui')
            ->where('emailvalide','oui')
            ->get();
        return view('admin.adminAddAdminmail',compact('users'));
    }

    public function adminAddAdminmailPost( Request $request)
    {
        if (strlen($request->courrier)>65000)
            return redirect()->back()->with('ErrorMessage','Le courrier est trop long.');

        $receivers=null;
        $receivers_mails=collect();
        $users=\App\Models\User::whereIn('id',$request->users_id)->get();
        foreach($users as $user)
        {
            $receivers=$receivers . $user->id . ";"  . $user->name . ";" . $user->email . ";";
            $receivers_mails->push($user->email);
        }
        //supprimer le dernier ';'
        $receivers=substr($receivers, 0, -1);

        $mailenvoye = new \App\Models\Mailenvoye();
        $mailenvoye->sujet=$request->sujet;
        $mailenvoye->courrier=$request->courrier;
        $mailenvoye->sender_id=\Auth::user()->id;
        $mailenvoye->receivers=$receivers;
        $mailenvoye->date_envoi=now();
        $mailenvoye->nbrereceivers=count($request->users_id);

        $mailenvoye->save();


        //mail
        $destinataires=$receivers_mails->toArray();
        $name="";
        $titre="";
        $message=$mailenvoye->courrier;
        $salutation="";
        $subject=$mailenvoye->sujet;
        $notezbien="";

        dd($destinataires);
        //Mail::to("notification@elkefi.tn")->bcc($destinataires)->send(new MailAlert($name,$titre,$message,$salutation,$subject,$notezbien));
            


        return redirect()->route('adminShowAdminmails')->with('SuccessMessage','Mail envoyé avec succès');
    }

    







}
