<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TextGeneratorController;
Route::get('/text', [TextGeneratorController::class, 'text']);

Route::post('/generate-text', [TextGeneratorController::class, 'generateText']);


Route::Get('/','App\Http\Controllers\FrontController@welcome')->name('welcome');
Route::Get('/Laboratoires','App\Http\Controllers\FrontController@laboratoires')->name('laboratoires');
Route::Get('/Projets','App\Http\Controllers\FrontController@projets')->name('projets');
Route::Get('/Publications','App\Http\Controllers\FrontController@publications')->name('publications');




//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('getFile/{rep}/{filename}', 'App\Http\Controllers\ImagineController@getFile')->name('getFile');
    Route::post('saveFile', 'App\Http\Controllers\ImagineController@saveFile')->name('saveFile');
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/alerts/{type}', 'App\Http\Controllers\DashboardController@alerts')->name('alerts');
    Route::get('/goAlert/{id}', 'App\Http\Controllers\DashboardController@goAlert')->name('goAlert');
    Route::get('/delete_alert/{id}', 'App\Http\Controllers\DashboardController@delete_alert')->name('delete_alert');
    Route::get('/profile', 'App\Http\Controllers\DashboardController@profile')->name('profile');
    Route::post('/profilePost', 'App\Http\Controllers\DashboardController@profilePost')->name('profilePost');
    Route::post('/addSecurites', 'App\Http\Controllers\SecuriteController@addSecurites')->name('addSecurites');
    Route::get('/note/{file}', 'App\Http\Controllers\DashboardController@gofile')->name('gofile');
    Route::post('/photoprofilePost', 'App\Http\Controllers\DashboardController@photoprofilePost')->name('photoprofilePost');
   
    //Message Admin
    Route::POST('/MarkUserAsReadMessagePost', 'App\Http\Controllers\AdminUserController@MarkUserAsReadMessagePost')->name('MarkUserAsReadMessagePost');

    
});


// for users
Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
   
});

Route::group(['middleware' => ['auth', 'role:Etudiante de recherche']], function() { 
//projets
    Route::get('etudiant/projets', [App\Http\Controllers\ProjetController::class, 'etudiantShowProjets'])->name('etudiantShowProjets');
    Route::get('etudiant/etudiantShowProjet/{id}', [App\Http\Controllers\ProjetController::class, 'etudiantShowProjet'])->name('etudiantShowProjet');
//contacts
Route::get('etudiant/contacts', [App\Http\Controllers\ContactController::class, 'etudiantShowContacts'])->name('etudiantShowContacts');
Route::get('etudiant/etudiantEditContact/{id}', [App\Http\Controllers\ContactController::class, 'etudiantEditContact'])->name('etudiantEditContact');
 Route::get('etudiant/etudiantDeleteContact/{id}', [App\Http\Controllers\ContactController::class, 'etudiantDeleteContact'])->name('etudiantDeleteContact');
 Route::post('etudiant/etudiantEditContactPost', [App\Http\Controllers\ContactController::class, 'etudiantEditContactPost'])->name('etudiantEditContactPost');
 Route::post('etudiant/etudiantDeleteContactPost', [App\Http\Controllers\ContactController::class, 'etudiantDeleteContactPost'])->name('etudiantDeleteContactPost');
 Route::get('etudiant/etudiantAddContact', [App\Http\Controllers\ContactController::class, 'etudiantAddContact'])->name('etudiantAddContact');
 Route::post('etudiant/etudiantAddContactPost', [App\Http\Controllers\ContactController::class, 'etudiantAddContactPost'])->name('etudiantAddContactPost');
 Route::get('etudiant/etudiantShowContact/{id}', [App\Http\Controllers\ContactController::class, 'etudiantShowContact'])->name('etudiantShowContact');
//mon encadrement
Route::get('etudiant/Encadrement', [App\Http\Controllers\EncadrementController::class, 'etudiantShowEncadrement'])->name('etudiantShowEncadrement');
 //Encadrements_rendezvous
 Route::get('etudiant/etudiantEditEncadrementrendezvous/{id}', [App\Http\Controllers\EncadrementController::class, 'etudiantEditEncadrementrendezvous'])->name('etudiantEditEncadrementrendezvous');
 Route::post('etudiant/etudiantEditEncadrementrendezvousPost', [App\Http\Controllers\EncadrementController::class, 'etudiantEditEncadrementrendezvousPost'])->name('etudiantEditEncadrementrendezvousPost');
 
 
 //encadrements_taches
 Route::get('etudiant/etudiantEditEncadrementtache/{id}', [App\Http\Controllers\EncadrementController::class, 'etudiantEditEncadrementtache'])->name('etudiantEditEncadrementtache');
 Route::post('etudiant/etudiantEditEncadrementtachePost', [App\Http\Controllers\EncadrementController::class, 'etudiantEditEncadrementtachePost'])->name('etudiantEditEncadrementtachePost');
 
 //encadrements_fichiers
 Route::get('etudiant/etudiantAddEncadrementfichier', [App\Http\Controllers\EncadrementController::class, 'etudiantAddEncadrementfichier'])->name('etudiantAddEncadrementfichier');
 Route::post('etudiant/etudiantAddEncadrementfichierPost', [App\Http\Controllers\EncadrementController::class, 'etudiantAddEncadrementfichierPost'])->name('etudiantAddEncadrementfichierPost');
 Route::get('etudiant/etudiantEditEncadrementfichier/{id}', [App\Http\Controllers\EncadrementController::class, 'etudiantEditEncadrementfichier'])->name('etudiantEditEncadrementfichier');
 Route::post('etudiant/etudiantEditEncadrementfichierPost', [App\Http\Controllers\EncadrementController::class, 'etudiantEditEncadrementfichierPost'])->name('etudiantEditEncadrementfichierPost');
 Route::get('etudiant/etudiantDeleteEncadrementfichier/{id}', [App\Http\Controllers\EncadrementController::class, 'etudiantDeleteEncadrementfichier'])->name('etudiantDeleteEncadrementfichier');
 Route::post('etudiant/etudiantDeleteEncadrementfichierPost', [App\Http\Controllers\EncadrementController::class, 'etudiantDeleteEncadrementfichierPost'])->name('etudiantDeleteEncadrementfichierPost');
     //taches
     Route::get('etudiant/etudiantEditTache/{id}', [App\Http\Controllers\TacheController::class, 'etudiantEditTache'])->name('etudiantEditTache');
     Route::post('etudiant/etudiantEditTachePost', [App\Http\Controllers\TacheController::class, 'etudiantEditTachePost'])->name('etudiantEditTachePost');
       
    
    });

Route::group(['middleware' => ['auth', 'role:Chef de projet']], function() { 

 //Projets
 Route::get('chefprojet/projets', [App\Http\Controllers\ProjetController::class, 'chefprojetShowProjets'])->name('chefprojetShowProjets');
Route::get('chefprojet/chefprojetShowProjet/{id}', [App\Http\Controllers\ProjetController::class, 'chefprojetShowProjet'])->name('chefprojetShowProjet');
 //ajouter  tache et modifier tache
 Route::get('chefprojet/chefprojetAddTache/{id}', [App\Http\Controllers\TacheController::class, 'chefprojetAddTache'])->name('chefprojetAddTache');
 Route::post('chefprojet/chefprojetAddTachePost', [App\Http\Controllers\TacheController::class, 'chefprojetAddTachePost'])->name('chefprojetAddTachePost');
 Route::get('chefprojet/chefprojetEditTache/{id}', [App\Http\Controllers\TacheController::class, 'chefprojetEditTache'])->name('chefprojetEditTache');
 Route::post('chefprojet/chefprojetEditTachePost', [App\Http\Controllers\TacheController::class, 'chefprojetEditTachePost'])->name('chefprojetEditTachePost');
 Route::get('chefprojet/chefprojetDeleteTache/{id}', [App\Http\Controllers\TacheController::class, 'chefprojetDeleteTache'])->name('chefprojetDeleteTache');
 Route::post('chefprojet/chefprojetDeleteTachePost', [App\Http\Controllers\TacheController::class, 'chefprojetDeleteTachePost'])->name('chefprojetDeleteTachePost');
     
});

Route::group(['middleware' => ['auth', 'role:technicien']], function() { 
    //maintenances
     Route::get('technicien/maintenances', [App\Http\Controllers\EquipementMaintenanceController::class, 'technicienShowMaintenances'])->name('technicienShowMaintenances');
      Route::get('technicien/technicienAddMaintenance', [App\Http\Controllers\EquipementMaintenanceController::class, 'technicienAddMaintenance'])->name('technicienAddMaintenance');
      Route::post('technicien/technicienAddMaintenancePost', [App\Http\Controllers\EquipementMaintenanceController::class, 'technicienAddMaintenancePost'])->name('technicienAddMaintenancePost');
     Route::get('technicien/technicienEditMaintenance/{id}', [App\Http\Controllers\EquipementMaintenanceController::class, 'technicienEditMaintenance'])->name('technicienEditMaintenance');
     Route::get('technicien/technicienDeleteMaintenance/{id}', [App\Http\Controllers\EquipementMaintenanceController::class, 'technicienDeleteMaintenance'])->name('technicienDeleteMaintenance');
     Route::post('technicien/technicienEditMaintenancePost', [App\Http\Controllers\EquipementMaintenanceController::class, 'technicienEditMaintenancePost'])->name('technicienEditMaintenancePost');
     Route::post('technicien/technicienDeleteMaintenancePost', [App\Http\Controllers\EquipementMaintenanceController::class, 'technicienDeleteMaintenancePost'])->name('technicienDeleteMaintenancePost');
     Route::get('technicien/technicienShowMaintenance/{id}', [App\Http\Controllers\EquipementMaintenanceController::class, 'technicienShowMaintenance'])->name('technicienShowMaintenance');
     
     
     //equipement
     Route::get('technicien/equipements', [App\Http\Controllers\EquipementController::class, 'technicienShowEquipements'])->name('technicienShowEquipements');
     Route::get('technicien/technicienAddEquipement', [App\Http\Controllers\EquipementController::class, 'technicienAddEquipement'])->name('technicienAddEquipement');
     Route::post('technicien/technicienAddEquipementPost', [App\Http\Controllers\EquipementController::class, 'technicienAddEquipementPost'])->name('technicienAddEquipementPost');
     Route::get('technicien/technicienEditEquipement/{id}', [App\Http\Controllers\EquipementController::class, 'technicienEditEquipement'])->name('technicienEditEquipement');
     Route::get('technicien/technicienDeleteEquipement/{id}', [App\Http\Controllers\EquipementController::class, 'technicienDeleteEquipement'])->name('technicienDeleteEquipement');
     Route::post('technicien/technicienEditEquipementPost', [App\Http\Controllers\EquipementController::class, 'technicienEditEquipementPost'])->name('technicienEditEquipementPost');
     Route::post('technicien/technicienDeleteEquipementPost', [App\Http\Controllers\EquipementController::class, 'technicienDeleteEquipementPost'])->name('technicienDeleteEquipementPost');
     Route::get('technicien/technicienShowEquipement/{id}', [App\Http\Controllers\EquipementController::class, 'technicienShowEquipement'])->name('technicienShowEquipement');
     
 //contacts
 
 Route::get('technicien/contacts', [App\Http\Controllers\ContactController::class, 'technicienShowContacts'])->name('technicienShowContacts');
 Route::get('technicien/techncienShowContact/{id}', [App\Http\Controllers\ContactController::class, 'technicienShowContact'])->name('technicienShowContact');
 Route::get('technicien/technicienEditContact/{id}', [App\Http\Controllers\ContactController::class, 'technicienEditContact'])->name('technicienEditContact');
 Route::get('technicien/technicienDeleteContact/{id}', [App\Http\Controllers\ContactController::class, 'technicienDeleteContact'])->name('technicienDeleteContact');
 Route::post('technicien/technicienEditContactPost', [App\Http\Controllers\ContactController::class, 'technicienEditContactPost'])->name('technicienEditContactPost');
 Route::post('technicien/technicienDeleteContactPost', [App\Http\Controllers\ContactController::class, 'technicienDeleteContactPost'])->name('technicienDeleteContactPost');
 //mes contacts
 Route::get('technicien/Mescontacts', [App\Http\Controllers\ContactController::class, 'technicienShowMesContacts'])->name('technicienShowMesContacts');
 Route::get('technicien/technicienEditMesContact/{id}', [App\Http\Controllers\ContactController::class, 'technicienEditMesContact'])->name('technicienEditMesContact');
 Route::get('technicien/technicienDeleteMesContact/{id}', [App\Http\Controllers\ContactController::class, 'technicienDeleteMesContact'])->name('technicienDeleteMesContact');
 Route::post('technicien/technicienEditMesContactPost', [App\Http\Controllers\ContactController::class, 'technicienEditMesContactPost'])->name('technicienEditMesContactPost');
 Route::post('technicien/technicienDeleteMesContactPost', [App\Http\Controllers\ContactController::class, 'technicienDeleteMesContactPost'])->name('technicienDeleteMesContactPost');

 Route::get('technicien/technicienAddContact', [App\Http\Controllers\ContactController::class, 'technicienAddContact'])->name('technicienAddContact');
 Route::post('technicien/technicienAddContactPost', [App\Http\Controllers\ContactController::class, 'technicienAddContactPost'])->name('technicienAddContactPost');
 //mes messages
 Route::get('technicien/Messages', [App\Http\Controllers\MessageController::class, 'technicienShowMessages'])->name('technicienShowMessages');
 Route::get('technicien/technicienAddMessage', [App\Http\Controllers\MessageController::class, 'technicienAddMessage'])->name('technicienAddMessage');
 Route::post('technicien/technicienAddMessagePost', [App\Http\Controllers\MessageController::class, 'technicienAddMessagePost'])->name('technicienAddMessagePost');

     });
 
 

Route::group(['middleware' => ['auth', 'role:directeur']], function() { 
        //publications
        Route::get('directeur/publications', [App\Http\Controllers\PublicationController::class, 'directeurShowPublications'])->name('directeurShowPublications');
        Route::get('directeur/directeurShowPublication/{id}', [App\Http\Controllers\PublicationController::class, 'directeurShowPublication'])->name('directeurShowPublication');
         //contacts
        Route::get('directeur/contacts', [App\Http\Controllers\ContactController::class, 'directeurShowContacts'])->name('directeurShowContacts');
        Route::get('directeur/directeurEditContact/{id}', [App\Http\Controllers\ContactController::class, 'directeurEditContact'])->name('directeurEditContact');
          Route::post('directeur/directeurEditContactPost', [App\Http\Controllers\ContactController::class, 'directeurEditContactPost'])->name('directeurEditContactPost');
          Route::get('directeur/directeurDeleteContact/{id}', [App\Http\Controllers\ContactController::class, 'directeurDeleteContact'])->name('directeurDeleteContact');
          Route::post('directeur/directeurDeleteContactPost', [App\Http\Controllers\ContactController::class, 'directeurDeleteContactPost'])->name('directeurDeleteContactPost');
          Route::get('directeur/directeurShowContact/{id}', [App\Http\Controllers\ContactController::class, 'directeurShowContact'])->name('directeurShowContact');
         
         //Encadrements
        Route::get('directeur/Encadrements', [App\Http\Controllers\EncadrementController::class, 'directeurShowEncadrements'])->name('directeurShowEncadrements');
        Route::get('directeur/directeurShowEncadrement/{id}', [App\Http\Controllers\EncadrementController::class, 'directeurShowEncadrement'])->name('directeurShowEncadrement');
         
        //fonds
          Route::get('directeur/fonds', [App\Http\Controllers\FondController::class, 'directeurShowFonds'])->name('directeurShowFonds');
           Route::get('directeur/directeurAddFond', [App\Http\Controllers\FondController::class, 'directeurAddFond'])->name('directeurAddFond');
          Route::post('directeur/directeurAddFondPost', [App\Http\Controllers\FondController::class, 'directeurAddFondPost'])->name('directeurAddFondPost');
          Route::get('directeur/directeurEditFond/{id}', [App\Http\Controllers\FondController::class, 'directeurEditFond'])->name('directeurEditFond');
          Route::post('directeur/directeurEditFondPost', [App\Http\Controllers\FondController::class, 'directeurEditFondPost'])->name('directeurEditFondPost');
          Route::get('directeur/directeurDeleteFond/{id}', [App\Http\Controllers\FondController::class, 'directeurDeleteFond'])->name('directeurDeleteFond');
          Route::post('directeur/directeurDeleteFondPost', [App\Http\Controllers\FondController::class, 'directeurDeleteFondPost'])->name('directeurDeleteFondPost');
          Route::get('directeur/directeurShowFond/{id}', [App\Http\Controllers\FondController::class, 'directeurShowFond'])->name('directeurShowFond');
         //depense fond
         Route::get('directeur/directeurAddDepenseFond', [App\Http\Controllers\FondController::class, 'directeurAddDepenseFond'])->name('directeurAddDepenseFond');
         Route::post('directeur/directeurAddDepenseFondPost', [App\Http\Controllers\FondController::class, 'directeurAddDepenseFondPost'])->name('directeurAddDepenseFondPost');
         Route::get('directeur/directeurDeleteDepenseFond/{id}', [App\Http\Controllers\FondController::class, 'directeurDeleteDepenseFond'])->name('directeurDeleteDepenseFond');
         Route::post('directeur/directeurDeleteDepenseFondPost', [App\Http\Controllers\FondController::class, 'directeurDeleteDepenseFondPost'])->name('directeurDeleteDepenseFondPost');
         Route::get('directeur/directeurEditDepenseFond/{id}', [App\Http\Controllers\FondController::class, 'directeurEditDepenseFond'])->name('directeurEditDepenseFond');
         Route::post('directeur/directeurEditDepenseFondPost', [App\Http\Controllers\FondController::class, 'directeurEditDepenseFondPost'])->name('directeurEditDepenseFondPost');
        
           //Taches
          Route::get('directeur/taches', [App\Http\Controllers\TacheController::class, 'directeurShowTaches'])->name('directeurShowTaches');
          Route::get('directeur/directeurAddTache/{id}', [App\Http\Controllers\TacheController::class, 'directeurAddTache'])->name('directeurAddTache');
          Route::post('directeur/directeurAddTachePost', [App\Http\Controllers\TacheController::class, 'directeurAddTachePost'])->name('directeurAddTachePost');
          Route::get('directeur/directeurEditTache/{id}', [App\Http\Controllers\TacheController::class, 'directeurEditTache'])->name('directeurEditTache');
          Route::post('directeur/directeurEditTachePost', [App\Http\Controllers\TacheController::class, 'directeurEditTachePost'])->name('directeurEditTachePost');
          Route::get('directeur/directeurDeleteTache/{id}', [App\Http\Controllers\TacheController::class, 'directeurDeleteTache'])->name('directeurDeleteTache');
          Route::post('directeur/directeurDeleteTachePost', [App\Http\Controllers\TacheController::class, 'directeurDeleteTachePost'])->name('directeurDeleteTachePost');
          Route::get('directeur/directeurShowTache/{id}', [App\Http\Controllers\TacheController::class, 'directeurShowTache'])->name('directeurShowTache');
           
  ///laborataire

        Route::get('directeur/Laborataire', 'App\Http\Controllers\LaborataireController@directeurShowlaborataire')->name('directeurShowlaborataire');
        Route::get('directeur/directeurEditLaborataire/{id}', 'App\Http\Controllers\LaborataireController@directeurEditLaborataire')->name('directeurEditLaborataire');
        Route::POST('directeur/directeurEditLaboratairePost', 'App\Http\Controllers\LaborataireController@directeurEditLaboratairePost')->name('directeurEditLaboratairePost');
        Route::get('directeur/directeurShowLaborataire/{id}', 'App\Http\Controllers\LaborataireController@directeurShowLaborataire')->name('directeurShowLaborataire');
      

 //membres
 Route::get('directeur/directeurAddMembre', 'App\Http\Controllers\LaborataireController@directeurAddMembre')->name('directeurAddMembre');
 Route::POST('directeur/directeurAddMembrePost', 'App\Http\Controllers\LaborataireController@directeurAddMembrePost')->name('directeurAddMembrePost');
 Route::get('directeur/directeurEditMembree/{id}', 'App\Http\Controllers\LaborataireController@directeurEditMembre')->name('directeurEditMembre');
 Route::POST('directeur/directeurEditMembrePost', 'App\Http\Controllers\LaborataireController@directeurEditMembrePost')->name('directeurEditMembrePost');
 Route::get('directeur/directeurDeleteMembre/{id}', 'App\Http\Controllers\LaborataireController@directeurDeleteMembre')->name('directeurDeleteMembre');
 Route::POST('directeur/directeurDeleteMembrePost', 'App\Http\Controllers\LaborataireController@directeurDeleteMembrePost')->name('directeurDeleteMembrePost');
 Route::get('directeur/directeurShowMembre/{id}', 'App\Http\Controllers\LaborataireController@directeurShowMembre')->name('directeurShowMembre');

            //Projets
        Route::get('directeur/projets', [App\Http\Controllers\ProjetController::class, 'directeurShowProjets'])->name('directeurShowProjets');
        Route::get('directeur/directeurAddProjet', [App\Http\Controllers\ProjetController::class, 'directeurAddProjet'])->name('directeurAddProjet');
        Route::post('directeur/directeurAddProjetPost', [App\Http\Controllers\ProjetController::class, 'directeurAddProjetPost'])->name('directeurAddProjetPost');
        Route::get('directeur/directeurEditProjet/{id}', [App\Http\Controllers\ProjetController::class, 'directeurEditProjet'])->name('directeurEditProjet');
        Route::post('directeur/directeurEditProjetPost', [App\Http\Controllers\ProjetController::class, 'directeurEditProjetPost'])->name('directeurEditProjetPost');
        Route::get('directeur/directeurDeleteProjet/{id}', [App\Http\Controllers\ProjetController::class, 'directeurDeleteProjet'])->name('directeurDeleteProjet');
        Route::post('directeur/directeurDeleteProjetPost', [App\Http\Controllers\ProjetController::class, 'directeurDeleteProjetPost'])->name('directeurDeleteProjetPost');
        Route::get('directeur/directeurShowProjet/{id}', [App\Http\Controllers\ProjetController::class, 'directeurShowProjet'])->name('directeurShowProjet');
        

      Route::post('generateDescription', [App\Http\Controllers\ProjetController::class, 'generateDescription'])->name('generateDescription');

        //ressources
        
            Route::get('directeur/ressources', [App\Http\Controllers\RessourceController::class, 'directeurShowRessources'])->name('directeurShowRessources');
            Route::get('directeur/directeurAddRessource', [App\Http\Controllers\RessourceController::class, 'directeurAddRessource'])->name('directeurAddRessource');
            Route::post('directeur/directeurAddRessourcePost', [App\Http\Controllers\RessourceController::class, 'directeurAddRessourcePost'])->name('directeurAddRessourcePost');
            Route::get('directeur/directeurEditRessource/{id}', [App\Http\Controllers\RessourceController::class, 'directeurEditRessource'])->name('directeurEditRessource');
            Route::post('directeur/directeurEditRessourcePost', [App\Http\Controllers\RessourceController::class, 'directeurEditRessourcePost'])->name('directeurEditRessourcePost');
            Route::get('directeur/directeurDeleteRessource/{id}', [App\Http\Controllers\RessourceController::class, 'directeurDeleteRessource'])->name('directeurDeleteRessource');
            Route::post('directeur/directeurDeleteRessourcePost', [App\Http\Controllers\RessourceController::class, 'directeurDeleteRessourcePost'])->name('directeurDeleteRessourcePost');
            Route::get('directeur/directeurShowRessource/{id}', [App\Http\Controllers\RessourceController::class, 'directeurShowRessource'])->name('directeurShowRessource');
           

//equipement
Route::get('directeur/equipements', [App\Http\Controllers\EquipementController::class, 'directeurShowEquipements'])->name('directeurShowEquipements');
Route::get('directeur/directeurAddEquipement', [App\Http\Controllers\EquipementController::class, 'directeurAddEquipement'])->name('directeurAddEquipement');
Route::post('directeur/directeurAddEquipementPost', [App\Http\Controllers\EquipementController::class, 'directeurAddEquipementPost'])->name('directeurAddEquipementPost');
Route::get('directeur/directeurEditEquipement/{id}', [App\Http\Controllers\EquipementController::class, 'directeurEditEquipement'])->name('directeurEditEquipement');
Route::get('directeur/directeurDeleteEquipement/{id}', [App\Http\Controllers\EquipementController::class, 'directeurDeleteEquipement'])->name('directeurDeleteEquipement');
Route::post('directeur/directeurEditEquipementPost', [App\Http\Controllers\EquipementController::class, 'directeurEditEquipementPost'])->name('directeurEditEquipementPost');
Route::post('directeur/directeurDeleteEquipementPost', [App\Http\Controllers\EquipementController::class, 'directeurDeleteEquipementPost'])->name('directeurDeleteEquipementPost');

Route::get('directeur/directeurShowEquipement/{id}', [App\Http\Controllers\EquipementController::class, 'directeurShowEquipement'])->name('directeurShowEquipement');


        });

   
Route::group(['middleware' => ['auth', 'role:administrateur']], function() { 

   
    //adminmessages
        Route::get('/admin/adminShowAdminmessages', 'App\Http\Controllers\AdminUserController@adminShowAdminmessages')->name('adminShowAdminmessages');
        Route::get('/admin/adminShowAdminmessage/{id}', 'App\Http\Controllers\AdminUserController@adminShowAdminmessage')->name('adminShowAdminmessage');
        Route::get('/admin/adminAddAdminmessage', 'App\Http\Controllers\AdminUserController@adminAddAdminmessage')->name('adminAddAdminmessage');
        Route::POST('/admin/adminAddAdminmessagePost', 'App\Http\Controllers\AdminUserController@adminAddAdminmessagePost')->name('adminAddAdminmessagePost');
        Route::get('/admin/adminEditAdminmessage/{id}', 'App\Http\Controllers\AdminUserController@adminEditAdminmessage')->name('adminEditAdminmessage');
        Route::POST('/admin/adminEditAdminmessagePost', 'App\Http\Controllers\AdminUserController@adminEditAdminmessagePost')->name('adminEditAdminmessagePost');
        Route::get('/admin/adminDeleteAdminmessage/{id}', 'App\Http\Controllers\AdminUserController@adminDeleteAdminmessage')->name('adminDeleteAdminmessage');
        Route::POST('/admin/adminDeleteAdminmessagePost', 'App\Http\Controllers\AdminUserController@adminDeleteAdminmessagePost')->name('adminDeleteAdminmessagePost');
        Route::get('/admin/adminDiffuseAdminmessage/{id}', 'App\Http\Controllers\AdminUserController@adminDiffuseAdminmessage')->name('adminDiffuseAdminmessage');
        Route::POST('/admin/adminDiffuseAdminmessagePost', 'App\Http\Controllers\AdminUserController@adminDiffuseAdminmessagePost')->name('adminDiffuseAdminmessagePost');
        Route::get('/admin/adminAnnuleAdminmessage/{id}', 'App\Http\Controllers\AdminUserController@adminAnnuleAdminmessage')->name('adminAnnuleAdminmessage');
        Route::POST('/admin/adminAnnuleAdminmessagePost', 'App\Http\Controllers\AdminUserController@adminAnnuleAdminmessagePost')->name('adminAnnuleAdminmessagePost');
       
    //adminmails
        Route::get('/admin/adminShowAdminmails', 'App\Http\Controllers\AdminUserController@adminShowAdminmails')->name('adminShowAdminmails');
        Route::get('/admin/adminShowAdminmail/{id}', 'App\Http\Controllers\AdminUserController@adminShowAdminmail')->name('adminShowAdminmail');
        Route::get('/admin/adminAddAdminmail', 'App\Http\Controllers\AdminUserController@adminAddAdminmail')->name('adminAddAdminmail');
        Route::POST('/admin/adminAddAdminmailPost', 'App\Http\Controllers\AdminUserController@adminAddAdminmailPost')->name('adminAddAdminmailPost');
    
    //Securite
        Route::get('/admin/securites', 'App\Http\Controllers\SecurityController@adminShowSecurites')->name('adminShowSecurites');
        Route::get('/admin/editSecurite/{id}', 'App\Http\Controllers\SecurityController@adminEditSecurite')->name('adminEditSecurite');
        Route::post('/admin/editSecuritePost', 'App\Http\Controllers\SecurityController@adminEditSecuritePost')->name('adminEditSecuritePost');
    
    //Users
        Route::get('/admin/users', 'App\Http\Controllers\AdminUserController@adminShowUsers')->name('adminShowUsers');
        Route::POST('/admin/usersPost', 'App\Http\Controllers\AdminUserController@adminShowUsersPost')->name('adminShowUsersPost');
        Route::get('/admin/user/{id}', 'App\Http\Controllers\AdminUserController@adminShowUser')->name('adminShowUser');
        Route::get('/admin/adminAddUser', 'App\Http\Controllers\AdminUserController@adminAddUser')->name('adminAddUser');
        Route::POST('/admin/adminAddUserPost', 'App\Http\Controllers\AdminUserController@adminAddUserPost')->name('adminAddUserPost');
        Route::get('/admin/adminEditUser/{id}', 'App\Http\Controllers\AdminUserController@adminEditUser')->name('adminEditUser');
        Route::POST('/admin/adminEditUserPost', 'App\Http\Controllers\AdminUserController@adminEditUserPost')->name('adminEditUserPost');
      
    //Roles    
        Route::get('/admin/roles', 'App\Http\Controllers\AdminUserController@adminShowRoles')->name('adminShowRoles');
        Route::get('/admin/adminAddRole', 'App\Http\Controllers\AdminUserController@adminAddRole')->name('adminAddRole');
        Route::POST('/admin/adminAddRolePost', 'App\Http\Controllers\AdminUserController@adminAddRolePost')->name('adminAddRolePost');
        Route::get('/admin/adminEditRole/{id}', 'App\Http\Controllers\AdminUserController@adminEditRole')->name('adminEditRole');
        Route::POST('/admin/adminEditRolePost', 'App\Http\Controllers\AdminUserController@adminEditRolePost')->name('adminEditRolePost');
        Route::get('/admin/adminDeleteRole/{id}', 'App\Http\Controllers\AdminUserController@adminDeleteRole')->name('adminDeleteRole');
        Route::POST('/admin/adminDeleteRolePost', 'App\Http\Controllers\AdminUserController@adminDeleteRolePost')->name('adminDeleteRolePost');
    
     //Notes
        Route::get('/admin/notes', 'App\Http\Controllers\ConfigurationController@adminShowNotes')->name('adminShowNotes');
        Route::get('/admin/adminAddNote', 'App\Http\Controllers\ConfigurationController@adminAddNote')->name('adminAddNote');
        Route::POST('/admin/adminAddNotePost', 'App\Http\Controllers\ConfigurationController@adminAddNotePost')->name('adminAddNotePost');
        Route::get('/admin/adminEditNote/{id}', 'App\Http\Controllers\ConfigurationController@adminEditNote')->name('adminEditNote');
        Route::POST('/admin/adminEditNotePost', 'App\Http\Controllers\ConfigurationController@adminEditNotePost')->name('adminEditNotePost');
        Route::get('/admin/adminDeleteNote/{id}', 'App\Http\Controllers\ConfigurationController@adminDeleteNote')->name('adminDeleteNote');
        Route::POST('/admin/adminDeleteNotePost', 'App\Http\Controllers\ConfigurationController@adminDeleteNotePost')->name('adminDeleteNotePost');
        //Labortaires
        Route::get('/admin/laborataires', 'App\Http\Controllers\LaborataireController@adminShowLaborataires')->name('adminShowLaborataires');
        Route::get('/admin/adminAddLaborataire', 'App\Http\Controllers\LaborataireController@adminAddLaborataire')->name('adminAddLaborataire');
        Route::POST('/admin/adminAddLaboratairePost', 'App\Http\Controllers\LaborataireController@adminAddLaboratairePost')->name('adminAddLaboratairePost');
        Route::get('/admin/adminEditLaborataire/{id}', 'App\Http\Controllers\LaborataireController@adminEditLaborataire')->name('adminEditLaborataire');
        Route::POST('/admin/adminEditLaboratairePost', 'App\Http\Controllers\LaborataireController@adminEditLaboratairePost')->name('adminEditLaboratairePost');
        Route::get('/admin/adminDeleteLaborataire/{id}', 'App\Http\Controllers\LaborataireController@adminDeleteLaborataire')->name('adminDeleteLaborataire');
        Route::POST('/admin/adminDeleteLaboratairePost', 'App\Http\Controllers\LaborataireController@adminDeleteLaboratairePost')->name('adminDeleteLaboratairePost');
        Route::get('/admin/adminShowLaborataire/{id}', 'App\Http\Controllers\LaborataireController@adminShowLaborataire')->name('adminShowLaborataire');
      
    });


    Route::group(['middleware' => ['auth', 'role:chercheur']], function() { 
        //projets
        Route::get('chercheur/projets', [App\Http\Controllers\ProjetController::class, 'chercheurShowProjets'])->name('chercheurShowProjets');
        Route::get('chercheur/chercheurAddProjet', [App\Http\Controllers\ProjetController::class, 'chercheurAddProjet'])->name('chercheurAddProjet');
        Route::post('chercheur/chercheurAddProjetPost', [App\Http\Controllers\ProjetController::class, 'chercheurAddProjetPost'])->name('chercheurAddProjetPost');
        Route::get('chercheur/chercheurDeleteProjet/{id}', [App\Http\Controllers\ProjetController::class, 'chercheurDeleteProjet'])->name('chercheurDeleteProjet');
        Route::post('chercheur/chercheurDeleteProjetPost', [App\Http\Controllers\ProjetController::class, 'chercheurDeleteProjetPost'])->name('chercheurDeleteProjetPost');
        Route::get('chercheur/chercheurEditProjet/{id}', [App\Http\Controllers\ProjetController::class, 'chercheurEditProjet'])->name('chercheurEditProjet');
        Route::post('chercheur/chercheurEditProjetPost', [App\Http\Controllers\ProjetController::class, 'chercheurEditProjetPost'])->name('chercheurEditProjetPost');
        Route::get('chercheur/chercheurShowProjet/{id}', [App\Http\Controllers\ProjetController::class, 'chercheurShowProjet'])->name('chercheurShowProjet');
        //encadrements
        Route::get('chercheur/encadrements', [App\Http\Controllers\EncadrementController::class, 'chercheurShowEncadrements'])->name('chercheurShowEncadrements');
        Route::get('chercheur/chercheurAddEncadrement', [App\Http\Controllers\EncadrementController::class, 'chercheurAddEncadrement'])->name('chercheurAddEncadrement');
        Route::post('chercheur/chercheurAddEncadrementPost', [App\Http\Controllers\EncadrementController::class, 'chercheurAddEncadrementPost'])->name('chercheurAddEncadrementPost');
        Route::get('chercheur/chercheurDeleteEncadrement/{id}', [App\Http\Controllers\EncadrementController::class, 'chercheurDeleteEncadrement'])->name('chercheurDeleteEncadrement');
        Route::post('chercheur/chercheurDeleteEncadrementPost', [App\Http\Controllers\EncadrementController::class, 'chercheurDeleteEncadrementPost'])->name('chercheurDeleteEncadrementPost');
        Route::get('chercheur/chercheurEditEncadrement/{id}', [App\Http\Controllers\EncadrementController::class, 'chercheurEditEncadrement'])->name('chercheurEditEncadrement');
        Route::post('chercheur/chercheurEditEncadrementPost', [App\Http\Controllers\EncadrementController::class, 'chercheurEditEncadrementPost'])->name('chercheurEditEncadrementPost');
        Route::get('chercheur/chercheurShowEncadrement/{id}', [App\Http\Controllers\EncadrementController::class, 'chercheurShowEncadrement'])->name('chercheurShowEncadrement');
        //publications
        Route::get('chercheur/publications', [App\Http\Controllers\PublicationController::class, 'chercheurShowPublications'])->name('chercheurShowPublications');
        Route::get('chercheur/chercheurAddPublication', [App\Http\Controllers\PublicationController::class, 'chercheurAddPublication'])->name('chercheurAddPublication');
        Route::post('chercheur/chercheurAddPublicationPost', [App\Http\Controllers\PublicationController::class, 'chercheurAddPublicationPost'])->name('chercheurAddPublicationPost');
        Route::get('chercheur/chercheurDeletePublication/{id}', [App\Http\Controllers\PublicationController::class, 'chercheurDeletePublication'])->name('chercheurDeletePublication');
        Route::post('chercheur/chercheurDeletePublicationPost', [App\Http\Controllers\PublicationController::class, 'chercheurDeletePublicationPost'])->name('chercheurDeletePublicationPost');
        Route::get('chercheur/chercheurEditPublication/{id}', [App\Http\Controllers\PublicationController::class, 'chercheurEditPublication'])->name('chercheurEditPublication');
        Route::post('chercheur/chercheurEditPublicationPost', [App\Http\Controllers\PublicationController::class, 'chercheurEditPublicationPost'])->name('chercheurEditPublicationPost');
        Route::get('chercheur/chercheurShowPublication/{id}', [App\Http\Controllers\PublicationController::class, 'chercheurShowPublication'])->name('chercheurShowPublication');
        //taches
       Route::get('chercheur/chercheurEditTache/{id}', [App\Http\Controllers\TacheController::class, 'chercheurEditTache'])->name('chercheurEditTache');
      Route::post('chercheur/chercheurEditTachePost', [App\Http\Controllers\TacheController::class, 'chercheurEditTachePost'])->name('chercheurEditTachePost');
      //contacts
    Route::get('chercheur/contacts', [App\Http\Controllers\ContactController::class, 'chercheurShowContacts'])->name('chercheurShowContacts');
    Route::get('chercheur/chercheurShowContact/{id}', [App\Http\Controllers\ContactController::class, 'chercheurShowContact'])->name('chercheurShowContact');
    Route::get('chercheur/chercheurAddContact', [App\Http\Controllers\ContactController::class, 'chercheurAddContact'])->name('chercheurAddContact');
    Route::post('chercheur/chercheurAddContactPost', [App\Http\Controllers\ContactController::class, 'chercheurAddContactPost'])->name('chercheurAddContactPost');
    Route::get('chercheur/chercheurEditContact/{id}', [App\Http\Controllers\ContactController::class, 'chercheurEditContact'])->name('chercheurEditContact');
    Route::post('chercheur/chercheurEditContactPost', [App\Http\Controllers\ContactController::class, 'chercheurEditContactPost'])->name('chercheurEditContactPost');
    Route::get('chercheur/chercheurDeleteContact/{id}', [App\Http\Controllers\ContactController::class, 'chercheurDeleteContact'])->name('chercheurDeleteContact');
    Route::post('chercheur/chercheurDeleteContactPost', [App\Http\Controllers\ContactController::class, 'chercheurDeleteContactPost'])->name('chercheurDeleteContactPost');
    Route::get('chercheur/chercheurAddContact', [App\Http\Controllers\ContactController::class, 'chercheurAddContact'])->name('chercheurAddContact');
    Route::post('chercheur/chercheurAddContactPost', [App\Http\Controllers\ContactController::class, 'chercheurAddContactPost'])->name('chercheurAddContactPost');
    //Encadrements_rendezvous
    Route::get('chercheur/chercheurAddEncadrementrendezvous', [App\Http\Controllers\EncadrementController::class, 'chercheurAddEncadrementrendezvous'])->name('chercheurAddEncadrementrendezvous');
    Route::post('chercheur/chercheurAddEncadrementrendezvousPost', [App\Http\Controllers\EncadrementController::class, 'chercheurAddEncadrementrendezvousPost'])->name('chercheurAddEncadrementrendezvousPost');
    Route::get('chercheur/chercheurEditEncadrementrendezvous/{id}', [App\Http\Controllers\EncadrementController::class, 'chercheurEditEncadrementrendezvous'])->name('chercheurEditEncadrementrendezvous');
    Route::post('chercheur/chercheurEditEncadrementrendezvousPost', [App\Http\Controllers\EncadrementController::class, 'chercheurEditEncadrementrendezvousPost'])->name('chercheurEditEncadrementrendezvousPost');
    Route::get('chercheur/chercheurDeleteEncadrementrendezvous/{id}', [App\Http\Controllers\EncadrementController::class, 'chercheurDeleteEncadrementrendezvous'])->name('chercheurDeleteEncadrementrendezvous');
    Route::post('chercheur/chercheurDeleteEncadrementrendezvousPost', [App\Http\Controllers\EncadrementController::class, 'chercheurDeleteEncadrementrendezvousPost'])->name('chercheurDeleteEncadrementrendezvousPost');
    
    
    //encadrements_taches
    Route::get('chercheur/chercheurAddEncadrementtache', [App\Http\Controllers\EncadrementController::class, 'chercheurAddEncadrementtache'])->name('chercheurAddEncadrementtache');
    Route::post('chercheur/chercheurAddEncadrementtachePost', [App\Http\Controllers\EncadrementController::class, 'chercheurAddEncadrementtachePost'])->name('chercheurAddEncadrementtachePost');
    Route::get('chercheur/chercheurEditEncadrementtache/{id}', [App\Http\Controllers\EncadrementController::class, 'chercheurEditEncadrementtache'])->name('chercheurEditEncadrementtache');
    Route::post('chercheur/chercheurEditEncadrementtachePost', [App\Http\Controllers\EncadrementController::class, 'chercheurEditEncadrementtachePost'])->name('chercheurEditEncadrementtachePost');
    Route::get('chercheur/chercheurDeleteEncadrementtache/{id}', [App\Http\Controllers\EncadrementController::class, 'chercheurDeleteEncadrementtache'])->name('chercheurDeleteEncadrementtache');
    Route::post('chercheur/chercheurDeleteEncadrementtachePost', [App\Http\Controllers\EncadrementController::class, 'chercheurDeleteEncadrementtachePost'])->name('chercheurDeleteEncadrementtachePost');
   
    //encadrements_fichiers
    Route::get('chercheur/chercheurAddEncadrementfichier', [App\Http\Controllers\EncadrementController::class, 'chercheurAddEncadrementfichier'])->name('chercheurAddEncadrementfichier');
    Route::post('chercheur/chercheurAddEncadrementfichierPost', [App\Http\Controllers\EncadrementController::class, 'chercheurAddEncadrementfichierPost'])->name('chercheurAddEncadrementfichierPost');
    Route::get('chercheur/chercheurEditEncadrementfichier/{id}', [App\Http\Controllers\EncadrementController::class, 'chercheurEditEncadrementfichier'])->name('chercheurEditEncadrementfichier');
    Route::post('chercheur/chercheurEditEncadrementfichierPost', [App\Http\Controllers\EncadrementController::class, 'chercheurEditEncadrementfichierPost'])->name('chercheurEditEncadrementfichierPost');
    Route::get('chercheur/chercheurDeleteEncadrementfichier/{id}', [App\Http\Controllers\EncadrementController::class, 'chercheurDeleteEncadrementfichier'])->name('chercheurDeleteEncadrementfichier');
    Route::post('chercheur/chercheurDeleteEncadrementfichierPost', [App\Http\Controllers\EncadrementController::class, 'chercheurDeleteEncadrementfichierPost'])->name('chercheurDeleteEncadrementfichierPost');
   
//messages
Route::get('chercheur/Messages', [App\Http\Controllers\MessageController::class, 'chercheurShowMessages'])->name('chercheurShowMessages');
 Route::get('chercheur/chercheurAddMessage', [App\Http\Controllers\MessageController::class, 'chercheurAddMessage'])->name('chercheurAddMessage');
 Route::post('chercheur/chercheurAddMessagePost', [App\Http\Controllers\MessageController::class, 'chercheurAddMessagePost'])->name('chercheurAddMessagePost');
 

     
        });
require __DIR__.'/auth.php';
