<?php require "view_begin.php"; ?>

<?php require "./nav.php"; ?>


<div class="flex-1 ml-60 p-4">

    <div class="max-w-1xl mx-auto">
<h2 class="text-troisieme_bleu text-[40px] font-normal font-inter"> Clients </h2>
<div class="flex justify-between">
    <h3 class="text-troisieme_bleu text-s font-thin">Consulter et gérer la liste des clients</h3>
    <?php require "view_avatar.php"; ?>
</div>





<div class="container bg-container rounded-xl px-20 py-24 my-6">
<h5 class="-mt-14 mb-6 text-base font-bold leading-6 break-words font-inter">Liste des clients</h5>
<div class="flex justify-end gap-x-20">
    <?php if ($role==='gestionnaire'): ?>
    <button type="button" id="btnModal" class="inline-flex font-medium items-center  hover:bg-blue-200 dark:hover:bg-blue-200 px-5 py-2 rounded-lg gap-x-2 text-sm text-bouton_gris bg-white dark:bg-white-800"> Ajouter un client<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#718096" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></button>
    <button class="btnModalEdit inline-flex font-medium items-center  hover:bg-blue-200 dark:hover:bg-blue-200 px-5 py-2 rounded-lg gap-x-2 text-sm text-bouton_gris bg-white dark:bg-white-800">Ajouter composantes - Modifier un client <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" viewBox="0 0 50 50">
<path d="M 43.125 2 C 41.878906 2 40.636719 2.488281 39.6875 3.4375 L 38.875 4.25 L 45.75 11.125 C 45.746094 11.128906 46.5625 10.3125 46.5625 10.3125 C 48.464844 8.410156 48.460938 5.335938 46.5625 3.4375 C 45.609375 2.488281 44.371094 2 43.125 2 Z M 37.34375 6.03125 C 37.117188 6.0625 36.90625 6.175781 36.75 6.34375 L 4.3125 38.8125 C 4.183594 38.929688 4.085938 39.082031 4.03125 39.25 L 2.03125 46.75 C 1.941406 47.09375 2.042969 47.457031 2.292969 47.707031 C 2.542969 47.957031 2.90625 48.058594 3.25 47.96875 L 10.75 45.96875 C 10.917969 45.914063 11.070313 45.816406 11.1875 45.6875 L 43.65625 13.25 C 44.054688 12.863281 44.058594 12.226563 43.671875 11.828125 C 43.285156 11.429688 42.648438 11.425781 42.25 11.8125 L 9.96875 44.09375 L 5.90625 40.03125 L 38.1875 7.75 C 38.488281 7.460938 38.578125 7.011719 38.410156 6.628906 C 38.242188 6.246094 37.855469 6.007813 37.4375 6.03125 C 37.40625 6.03125 37.375 6.03125 37.34375 6.03125 Z"></path>
</svg></button>
<?php endif; ?>

                                        
                                        
    </div>
<section class="container px-4 mx-auto">
    <div class="flex flex-col">
        <div class="-mx-4 my-12 overflow-x-auto sm:-mx-6 lg:-mx-12">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-second_bleu">
                <tr>
                    <?php if($role==='prestataire'):?>
                        <th scope="col" class=" font-['Inter'] px-4 py-3.5  text-sm font-normal text-left rtl:text-right text-white dark:text-white">
                        Id Composante
                    </th>
                    <?php endif;?>
                <?php if ($role === 'commercial' || $role==='prestataire' || $role==='gestionnaire' || $role==='admin'): ?>

                    <th scope="col" class=" font-['Inter'] px-4 py-3.5  text-sm font-normal text-left rtl:text-right text-white dark:text-white">
                        Clients
                    </th>
                    <?php endif; ?>
                

                    <?php if ($role === 'commercial' || $role==='interlocuteur' || $role==='admin'): ?>

                    <th scope="col" class=" font-['Inter'] px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white dark:text-white">
                        Composantes 
                    </th>
                    <?php endif; ?>
                    <?php if ($role === 'commercial' || $role==='admin'): ?>

                    <th scope="col" class=" font-['Inter'] px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white dark:text-white">
                        Interlocuteurs
                    </th>
                    
                    <?php endif; ?>
                    <?php if ($role === 'commercial' || $role ==='interlocuteur' || $role==='gestionnaire' || $role==='admin'): ?>

                    <th scope="col" class=" font-['Inter'] px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white dark:text-white">
                        Prestataires
                    </th>
                    <?php endif; ?>
                    <?php if($role === 'prestataire' || $role==='interlocuteur' || $role==='admin'):?>
                    <th scope="col" class=" font-['Inter'] flex justify-center px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white dark:text-white">
                        Statut
                    </th>
                    <?php endif; ?>

                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-white-200 dark:divide-white-700 dark:bg-white-900">
                <?php foreach ($clients as $client):?>
                    <tr>
                        <?php if($role==='prestataire'):?>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-black-300 whitespace-nowrap">
                            <div class="flex items-center gap-x-2">
                                <div>

                                    <h2 class="text-sm ml-4 font-medium text-gray-800 dark:text-black "><?= isset($client['id_composante']) ? $client['id_composante'] : '' ?>
</h2>
                                </div>
                            </div>
                        </td>
                        <?php endif;?>
                        <?php if($role==='commercial' || $role==='gestionnaire' || $role==='admin'):?>
                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-black-300 whitespace-nowrap">
                            <div class="flex items-center gap-x-2">
                                <div>

                                    <h2 class="text-sm ml-4 font-medium text-gray-800 dark:text-black "><?= isset($client['nomclient']) ? $client['nomclient'] : '' ?>
</h2>
                                </div>
                            </div>
                        </td>
                        <?php endif;?>

                        <?php if($role ==='prestataire'):?>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-black-300 whitespace-nowrap">
                            <div class="flex items-center gap-x-2">
                                <div>

                                    <h2 class="text-sm ml-4 font-medium text-gray-800 dark:text-black "><?= isset($client['nomcomposante']) ? $client['nomcomposante'] : '' ?>
</h2>
                                </div>
                            </div>
                        </td>
                        <?php endif;?>
                        <?php if($role === 'interlocuteur' || $role==='commercial' || $role==='admin' ):?>
                                 <td class="px-4 py-4 text-sm text-gray-500 dark:text-black-300 whitespace-nowrap">
                                 <div class="flex items-center gap-x-2">
                                     <div>
     
                                         <h2 class="text-sm ml-4 font-medium text-gray-800 dark:text-black "><?= isset($client['nomcomposante']) ? $client['nomcomposante'] : '' ?>
     </h2>
                                     </div>
                                 </div>
                             </td>
                        <?php endif;?>
                        <?php if($role==='commercial' ):?>
                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-black-300 whitespace-nowrap">
                            <div class="flex items-center gap-x-2">
                                <div>

                                    <h2 class="text-sm ml-4 font-medium text-gray-800 dark:text-black "><?= isset($client['nom_interlocuteur']) ? $client['nom_interlocuteur'] : '' ?>
</h2>
                                </div>
                            </div>
                        </td>
                        <?php endif;?>

                        <?php if($role==='commercial' ):?>
                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-black-300 whitespace-nowrap">
                            <div class="flex items-center gap-x-2">
                                <div>

                                    <h2 class="text-sm ml-4 font-medium text-gray-800 dark:text-black "><?= isset($client['nom_prestataire']) ? $client['nom_prestataire'] : '' ?>
</h2>
                                </div>
                            </div>
                        </td>
                        <?php endif;?>

                        <?php if($role === 'interlocuteur' || $role==='admin'):?>
                                 <td class="px-4 py-4 text-sm text-gray-500 dark:text-black-300 whitespace-nowrap">
                                 <div class="flex items-center gap-x-2">
                                     <div>
     
                                         <h2 class="text-sm ml-4 font-medium text-gray-800 dark:text-black "><?= isset($client['nom_prestataire']) ? $client['nom_prestataire'] : '',isset($client['prenom_prestataire']) ? $client['prenom_prestataire'] : '' ?>
     </h2>
                                     </div>
                                 </div>
                             </td>
                        <?php endif;?>
                        <?php if($role === 'gestionnaire' || $role==='admin'):?>

                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-black-300 whitespace-nowrap">

                                 <div class="flex items-center gap-x-2">
                                     <div>
     
                                     <h2 class="text-sm ml-4 font-medium text-gray-800 dark:text-black "><?= isset($client['nom_prestataire']) ? $client['nom_prestataire'] : '',isset($client['prenom_prestataire']) ? $client['prenom_prestataire'] : '' ?>
                                     </h2>
                                     </div>
                                 </div>
                             </td>
                            <?php endif;?>

                        <?php if ($role === 'prestataire' ): ?>

                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                            <div class="flex items-center justify-center gap-x-2">
                            <?php if (isset($client['nomcomposante'])):  $nom = trim($client['nomcomposante']);?>
                                       

                                    <a href="?controller=calendar&action=affiche&id_composante=<?php echo $client['id_composante']; ?>">
                                        <div class="inline-flex items-center px-3 py-1 text-gray-500 rounded-full gap-x-2 bg-gray-100/80 dark:bg-white-800">
                                            <h2 class="text-sm font-bold">Créer un BDL</h2>
                                        </div>
                                    </a>
                            </div>
                            <?php endif; ?>

                        </td>

                        <?php endif; ?>

                        <?php if ($role === 'interlocuteur' || $role==='admin'): ?>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                            <div class="flex items-center justify-center gap-x-2">
                            <?php if (isset($client['nom_prestataire'])):  $nom = trim($client['nom_prestataire']);?>
                                       

                                    <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/80 dark:bg-white-800">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <h2 class="text-sm font-bold">Bon de livraison</h2>
                                    </div>
                                
                            </div>
                            <?php endif; ?>

                        </td>
                       <?php endif; ?>

                        

                    </tr>

                      


                   <?php endforeach; ?>
            </tbody>
        </table>

                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-center mt-6">
       

        <div class="items-center hidden md:flex gap-x-3">
            <a href="#" class="px-2 py-1 text-lg text-white rounded-md dark:bg-second_bleu bg-blue-100/60">1</a>
            <a href="#" class="px-2 py-1 text-lg text-white rounded-md dark:hover:bg-bg-second_bleu dark:text-blue-300 hover:bg-second_bleu">2</a>
            <a href="#" class="px-2 py-1 text-lg text-white rounded-md dark:hover:bg-bg-second_bleu dark:text-blue-300 hover:bg-second_bleu">3</a>
            <a href="#" class="px-2 py-1 text-lg text-white rounded-md dark:hover:bg-bg-second_bleu dark:text-blue-300 hover:bg-second_bleu">...</a>
            <a href="#" class="px-2 py-1 text-lg text-white rounded-md dark:hover:bg-bg-second_bleu dark:text-blue-300 hover:bg-second_bleu">12</a>
            <a href="#" class="px-2 py-1 text-lg text-white rounded-md dark:hover:bg-bg-second_bleu dark:text-blue-300 hover:bg-second_bleu">13</a>
            <a href="#" class="px-2 py-1 text-lg text-white rounded-md dark:hover:bg-bg-second_bleu dark:text-blue-300 hover:bg-second_bleu">14</a>
        </div>

    </div>
</section>

<div id="modal" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 hidden flex justify-center items-center">
  <div class="w-full max-w-lg px-10 py-8 mx-auto bg-white border rounded-lg shadow-2xl relative">
  <h2 class="text-titre_p leading-5 flex justify-center font-bold mt-14 mb-10 text-titre font-roboto_sl tracking-wider">
    Nouveau client
</h2>
        <form action="?controller=clients&action=addClient" method="post" class="max-w-md mx-auto">
        <div class="flex items-center py-1">
                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="15" height="15">
                    <path d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z" />
                    <path d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z" />
                </svg>
                <label for="nomclient" class="ml-2 font-roboto">Nom</label>
            </div>
            <input class="border-b focus:outline-none focus:border-premier_bleu w-full py-2 px-2 no-outline  ring-gray-300 font-mono" type="text" id="nomclient" name="nomclient" required>
           
            
          
    
           
         

            <div class="flex items-center py-1">
                
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="16px" height="16px"><path d="M 11.839844 2.988281 C 11.070313 2.925781 10.214844 3.148438 9.425781 3.703125 C 8.730469 4.1875 7.230469 5.378906 5.828125 6.726563 C 5.128906 7.398438 4.460938 8.097656 3.945313 8.785156 C 3.425781 9.472656 2.972656 10.101563 3 11.015625 C 3.027344 11.835938 3.109375 14.261719 4.855469 17.980469 C 6.601563 21.695313 9.988281 26.792969 16.59375 33.402344 C 23.203125 40.011719 28.300781 43.398438 32.015625 45.144531 C 35.730469 46.890625 38.160156 46.972656 38.980469 47 C 39.890625 47.027344 40.519531 46.574219 41.207031 46.054688 C 41.894531 45.535156 42.59375 44.871094 43.265625 44.171875 C 44.609375 42.769531 45.800781 41.269531 46.285156 40.574219 C 47.390625 39 47.207031 37.140625 45.976563 36.277344 C 45.203125 35.734375 38.089844 31 37.019531 30.34375 C 35.933594 29.679688 34.683594 29.980469 33.566406 30.570313 C 32.6875 31.035156 30.308594 32.398438 29.628906 32.789063 C 29.117188 32.464844 27.175781 31.171875 23 26.996094 C 18.820313 22.820313 17.53125 20.878906 17.207031 20.367188 C 17.597656 19.6875 18.957031 17.320313 19.425781 16.425781 C 20.011719 15.3125 20.339844 14.050781 19.640625 12.957031 C 19.347656 12.492188 18.015625 10.464844 16.671875 8.429688 C 15.324219 6.394531 14.046875 4.464844 13.714844 4.003906 L 13.714844 4 C 13.28125 3.402344 12.605469 3.050781 11.839844 2.988281 Z M 11.65625 5.03125 C 11.929688 5.066406 12.09375 5.175781 12.09375 5.175781 C 12.253906 5.398438 13.65625 7.5 15 9.53125 C 16.34375 11.566406 17.714844 13.652344 17.953125 14.03125 C 17.992188 14.089844 18.046875 14.753906 17.65625 15.492188 L 17.65625 15.496094 C 17.214844 16.335938 15.15625 19.933594 15.15625 19.933594 L 14.871094 20.4375 L 15.164063 20.9375 C 15.164063 20.9375 16.699219 23.527344 21.582031 28.410156 C 26.46875 33.292969 29.058594 34.832031 29.058594 34.832031 L 29.558594 35.125 L 30.0625 34.839844 C 30.0625 34.839844 33.652344 32.785156 34.5 32.339844 C 35.238281 31.953125 35.902344 32.003906 35.980469 32.050781 C 36.671875 32.476563 44.355469 37.582031 44.828125 37.914063 C 44.84375 37.925781 45.261719 38.558594 44.652344 39.425781 L 44.648438 39.425781 C 44.28125 39.953125 43.078125 41.480469 41.824219 42.785156 C 41.195313 43.4375 40.550781 44.046875 40.003906 44.457031 C 39.457031 44.867188 38.96875 44.996094 39.046875 45 C 38.195313 44.972656 36.316406 44.953125 32.867188 43.332031 C 29.417969 41.714844 24.496094 38.476563 18.007813 31.984375 C 11.523438 25.5 8.285156 20.578125 6.664063 17.125 C 5.046875 13.675781 5.027344 11.796875 5 10.949219 C 5.003906 11.027344 5.132813 10.535156 5.542969 9.988281 C 5.953125 9.441406 6.558594 8.792969 7.210938 8.164063 C 8.519531 6.910156 10.042969 5.707031 10.570313 5.339844 L 10.570313 5.34375 C 11.003906 5.039063 11.382813 5 11.65625 5.03125 Z"/></svg>
                <label for="telclient" class="ml-2 font-roboto">Numéro de téléphone</label>
            </div>
            <input class="border-b focus:outline-none focus:border-premier_bleu w-full py-2 px-2 no-outline  ring-gray-300 font-mono" type="text" id="telclient" name="telclient" required>
           
    

    
    

          

<button type="button" id="closeModal" class="absolute top-0 right-0  m-2 p-2  rounded-full hover:bg-gray-300 focus:outline-none focus:ring focus:border-blue-300">        <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
</button>
            <button type="submit" class=" mt-12 w-full text-white bg-premier_bleu hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-premier_bleu dark:hover:bg-second_bleu dark:focus:ring-blue-800 font-roboto">Créer</button>

           
        </form>
        
    </div>
    

</div>




<div id="editModal" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 hidden flex justify-center items-center">
  <div class="w-full max-w-lg px-10 py-8 mx-auto bg-white border rounded-lg shadow-2xl relative">
  <h2 class="text-titre_p leading-5 flex justify-center font-bold mt-14 mb-10 text-titre font-roboto_sl tracking-wider">
    Modifier un client
</h2>
        <form action="?controller=clients&action=update" method="post" class="max-w-md mx-auto grid grid-cols-2">
        <div class="flex items-center py-1">
                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="15" height="15">
                    <path d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z" />
                    <path d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z" />
                </svg>
                <label for="nomclient" class="ml-2 font-roboto">Nom</label>
            </div>
            <input class="border-b focus:outline-none focus:border-premier_bleu w-full py-2 px-2 no-outline  ring-gray-300 font-mono" type="text" id="nomclient" name="nomclient" required>
           
            <div class="flex items-center py-1">
                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="15" height="15">
                    <path d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z" />
                    <path d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z" />
                </svg>
                <label for="nomclientedit" class="ml-2 font-roboto">Changer le nom</label>
            </div>
            <input class="border-b focus:outline-none focus:border-premier_bleu w-full py-2 px-2 no-outline  ring-gray-300 font-mono" type="text" id="nomclientedit" name="nomclientedit" required>
           

          
    
           
         

            <div class="flex items-center py-1">
                
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="16px" height="16px"><path d="M 11.839844 2.988281 C 11.070313 2.925781 10.214844 3.148438 9.425781 3.703125 C 8.730469 4.1875 7.230469 5.378906 5.828125 6.726563 C 5.128906 7.398438 4.460938 8.097656 3.945313 8.785156 C 3.425781 9.472656 2.972656 10.101563 3 11.015625 C 3.027344 11.835938 3.109375 14.261719 4.855469 17.980469 C 6.601563 21.695313 9.988281 26.792969 16.59375 33.402344 C 23.203125 40.011719 28.300781 43.398438 32.015625 45.144531 C 35.730469 46.890625 38.160156 46.972656 38.980469 47 C 39.890625 47.027344 40.519531 46.574219 41.207031 46.054688 C 41.894531 45.535156 42.59375 44.871094 43.265625 44.171875 C 44.609375 42.769531 45.800781 41.269531 46.285156 40.574219 C 47.390625 39 47.207031 37.140625 45.976563 36.277344 C 45.203125 35.734375 38.089844 31 37.019531 30.34375 C 35.933594 29.679688 34.683594 29.980469 33.566406 30.570313 C 32.6875 31.035156 30.308594 32.398438 29.628906 32.789063 C 29.117188 32.464844 27.175781 31.171875 23 26.996094 C 18.820313 22.820313 17.53125 20.878906 17.207031 20.367188 C 17.597656 19.6875 18.957031 17.320313 19.425781 16.425781 C 20.011719 15.3125 20.339844 14.050781 19.640625 12.957031 C 19.347656 12.492188 18.015625 10.464844 16.671875 8.429688 C 15.324219 6.394531 14.046875 4.464844 13.714844 4.003906 L 13.714844 4 C 13.28125 3.402344 12.605469 3.050781 11.839844 2.988281 Z M 11.65625 5.03125 C 11.929688 5.066406 12.09375 5.175781 12.09375 5.175781 C 12.253906 5.398438 13.65625 7.5 15 9.53125 C 16.34375 11.566406 17.714844 13.652344 17.953125 14.03125 C 17.992188 14.089844 18.046875 14.753906 17.65625 15.492188 L 17.65625 15.496094 C 17.214844 16.335938 15.15625 19.933594 15.15625 19.933594 L 14.871094 20.4375 L 15.164063 20.9375 C 15.164063 20.9375 16.699219 23.527344 21.582031 28.410156 C 26.46875 33.292969 29.058594 34.832031 29.058594 34.832031 L 29.558594 35.125 L 30.0625 34.839844 C 30.0625 34.839844 33.652344 32.785156 34.5 32.339844 C 35.238281 31.953125 35.902344 32.003906 35.980469 32.050781 C 36.671875 32.476563 44.355469 37.582031 44.828125 37.914063 C 44.84375 37.925781 45.261719 38.558594 44.652344 39.425781 L 44.648438 39.425781 C 44.28125 39.953125 43.078125 41.480469 41.824219 42.785156 C 41.195313 43.4375 40.550781 44.046875 40.003906 44.457031 C 39.457031 44.867188 38.96875 44.996094 39.046875 45 C 38.195313 44.972656 36.316406 44.953125 32.867188 43.332031 C 29.417969 41.714844 24.496094 38.476563 18.007813 31.984375 C 11.523438 25.5 8.285156 20.578125 6.664063 17.125 C 5.046875 13.675781 5.027344 11.796875 5 10.949219 C 5.003906 11.027344 5.132813 10.535156 5.542969 9.988281 C 5.953125 9.441406 6.558594 8.792969 7.210938 8.164063 C 8.519531 6.910156 10.042969 5.707031 10.570313 5.339844 L 10.570313 5.34375 C 11.003906 5.039063 11.382813 5 11.65625 5.03125 Z"/></svg>
                <label for="telclient" class="ml-2 font-roboto">Numéro de téléphone</label>
            </div>
            <input class="border-b focus:outline-none focus:border-premier_bleu w-full py-2 px-2 no-outline  ring-gray-300 font-mono" type="text" id="telclient" name="telclient" required>
           
            
            <div class="flex items-center py-1">
                
                                
                            
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 12 0.9921875 L 10.029297 3 L 5 3 C 3.9069372 3 3 3.9069372 3 5 L 3 19 C 3 20.093063 3.9069372 21 5 21 L 19 21 C 20.093063 21 21 20.093063 21 19 L 21 5 C 21 3.9069372 20.093063 3 19 3 L 13.970703 3 L 12 0.9921875 z M 12 3.8476562 L 13.130859 5 L 19 5 L 19 19 L 5 19 L 5 5 L 10.869141 5 L 12 3.8476562 z M 7 7 L 7 9 L 9 9 L 9 7 L 7 7 z M 11 7 L 11 9 L 17 9 L 17 7 L 11 7 z M 7 11 L 7 13 L 9 13 L 9 11 L 7 11 z M 11 11 L 11 13 L 17 13 L 17 11 L 11 11 z M 7 15 L 7 17 L 9 17 L 9 15 L 7 15 z M 11 15 L 11 17 L 17 17 L 17 15 L 11 15 z"/></svg>
            <label for="composantes" class="ml-2 font-roboto">Composantes</label>
        </div>
        <input class="border-b focus:outline-none focus:border-premier_bleu w-full py-2 px-2 no-outline  ring-gray-300 font-mono" type="text" id="composantes" name="composantes" required>
       
            <div class="flex items-center py-1">
                
                                
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="16px" height="16px"><path d="M 25 2 C 17.832031 2 12 7.832031 12 15 C 12 20.078125 15.105469 26.347656 18.140625 31.492188 C 21.171875 36.636719 24.203125 40.609375 24.203125 40.609375 L 25 41.644531 L 25.796875 40.609375 C 25.796875 40.609375 28.828125 36.636719 31.859375 31.492188 C 34.894531 26.347656 38 20.078125 38 15 C 38 7.832031 32.167969 2 25 2 Z M 25 4 C 31.085938 4 36 8.914063 36 15 C 36 19.214844 33.105469 25.445313 30.140625 30.476563 C 27.570313 34.832031 25.644531 37.339844 25 38.199219 C 24.355469 37.339844 22.429688 34.832031 19.859375 30.476563 C 16.894531 25.445313 14 19.214844 14 15 C 14 8.914063 18.914063 4 25 4 Z M 25 10 C 22.25 10 20 12.25 20 15 C 20 17.75 22.25 20 25 20 C 27.75 20 30 17.75 30 15 C 30 12.25 27.75 10 25 10 Z M 25 12 C 26.667969 12 28 13.332031 28 15 C 28 16.667969 26.667969 18 25 18 C 23.332031 18 22 16.667969 22 15 C 22 13.332031 23.332031 12 25 12 Z M 7.296875 32 L 1.578125 48 L 48.421875 48 L 42.703125 32 L 35.050781 32 C 34.660156 32.6875 34.269531 33.355469 33.878906 34 L 41.296875 34 L 45.578125 46 L 4.421875 46 L 8.703125 34 L 16.121094 34 C 15.730469 33.355469 15.339844 32.6875 14.949219 32 Z"/></svg>
                <label for="numero_rue" class="ml-2 font-roboto">N° Rue</label>
            </div>
            <input class="border-b focus:outline-none focus:border-premier_bleu w-full py-2 px-2 no-outline  ring-gray-300 font-mono" type="text"  id="numero_rue" name="numero_rue" required>
 
            <div class="flex items-center py-1">
                
                                
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="16px" height="16px"><path d="M 25 2 C 17.832031 2 12 7.832031 12 15 C 12 20.078125 15.105469 26.347656 18.140625 31.492188 C 21.171875 36.636719 24.203125 40.609375 24.203125 40.609375 L 25 41.644531 L 25.796875 40.609375 C 25.796875 40.609375 28.828125 36.636719 31.859375 31.492188 C 34.894531 26.347656 38 20.078125 38 15 C 38 7.832031 32.167969 2 25 2 Z M 25 4 C 31.085938 4 36 8.914063 36 15 C 36 19.214844 33.105469 25.445313 30.140625 30.476563 C 27.570313 34.832031 25.644531 37.339844 25 38.199219 C 24.355469 37.339844 22.429688 34.832031 19.859375 30.476563 C 16.894531 25.445313 14 19.214844 14 15 C 14 8.914063 18.914063 4 25 4 Z M 25 10 C 22.25 10 20 12.25 20 15 C 20 17.75 22.25 20 25 20 C 27.75 20 30 17.75 30 15 C 30 12.25 27.75 10 25 10 Z M 25 12 C 26.667969 12 28 13.332031 28 15 C 28 16.667969 26.667969 18 25 18 C 23.332031 18 22 16.667969 22 15 C 22 13.332031 23.332031 12 25 12 Z M 7.296875 32 L 1.578125 48 L 48.421875 48 L 42.703125 32 L 35.050781 32 C 34.660156 32.6875 34.269531 33.355469 33.878906 34 L 41.296875 34 L 45.578125 46 L 4.421875 46 L 8.703125 34 L 16.121094 34 C 15.730469 33.355469 15.339844 32.6875 14.949219 32 Z"/></svg>
                <label for="rue" class="ml-2 font-roboto">Rue</label>
            </div>
            <input class="border-b focus:outline-none focus:border-premier_bleu w-full py-2 px-2 no-outline  ring-gray-300 font-mono" type="text"  id="rue" name="rue" required>

            <div class="flex items-center py-1">
                
                                
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="16px" height="16px"><path d="M 25 2 C 17.832031 2 12 7.832031 12 15 C 12 20.078125 15.105469 26.347656 18.140625 31.492188 C 21.171875 36.636719 24.203125 40.609375 24.203125 40.609375 L 25 41.644531 L 25.796875 40.609375 C 25.796875 40.609375 28.828125 36.636719 31.859375 31.492188 C 34.894531 26.347656 38 20.078125 38 15 C 38 7.832031 32.167969 2 25 2 Z M 25 4 C 31.085938 4 36 8.914063 36 15 C 36 19.214844 33.105469 25.445313 30.140625 30.476563 C 27.570313 34.832031 25.644531 37.339844 25 38.199219 C 24.355469 37.339844 22.429688 34.832031 19.859375 30.476563 C 16.894531 25.445313 14 19.214844 14 15 C 14 8.914063 18.914063 4 25 4 Z M 25 10 C 22.25 10 20 12.25 20 15 C 20 17.75 22.25 20 25 20 C 27.75 20 30 17.75 30 15 C 30 12.25 27.75 10 25 10 Z M 25 12 C 26.667969 12 28 13.332031 28 15 C 28 16.667969 26.667969 18 25 18 C 23.332031 18 22 16.667969 22 15 C 22 13.332031 23.332031 12 25 12 Z M 7.296875 32 L 1.578125 48 L 48.421875 48 L 42.703125 32 L 35.050781 32 C 34.660156 32.6875 34.269531 33.355469 33.878906 34 L 41.296875 34 L 45.578125 46 L 4.421875 46 L 8.703125 34 L 16.121094 34 C 15.730469 33.355469 15.339844 32.6875 14.949219 32 Z"/></svg>
                    <label for="cp" class="ml-2 font-roboto">Code Postal</label>
                </div>
                <input class="border-b focus:outline-none focus:border-premier_bleu w-full py-2 px-2 no-outline  ring-gray-300 font-mono" type="text" id="cp" name="cp" required>
               
    

        <div class="flex items-center py-1">
                
                            
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="16px" height="16px"><path d="M 12 3.6132812 L 12 28 L 9 28 L 9 23 L 7 23 L 7 28 L 4 28 L 4 29 L 4 46 L 21 46 L 35 46 L 35 11.279297 L 32 10.279297 L 32 4 L 30 4 L 30 9.6113281 L 28 8.9453125 L 28 4 L 26 4 L 26 8.2792969 L 12 3.6132812 z M 14 6.3886719 L 33 12.720703 L 33 44 L 28 44 L 28 40.855469 C 29.715786 40.405591 31 38.850301 31 37 C 31 34.802706 29.197294 33 27 33 C 24.802706 33 23 34.802706 23 37 C 23 38.850301 24.284214 40.405591 26 40.855469 L 26 44 L 21 44 L 21 28 L 14 28 L 14 6.3886719 z M 16 12 L 16 14 L 22 14 L 22 12 L 16 12 z M 37 15 L 37 17 L 44 17 L 44 44 L 37 44 L 37 46 L 46 46 L 46 15 L 37 15 z M 16 16 L 16 18 L 31 18 L 31 16 L 16 16 z M 37 19 L 37 22 L 42 22 L 42 19 L 37 19 z M 16 20 L 16 22 L 24 22 L 24 20 L 16 20 z M 26 20 L 26 22 L 31 22 L 31 20 L 26 20 z M 16 24 L 16 26 L 31 26 L 31 24 L 16 24 z M 37 24 L 37 27 L 42 27 L 42 24 L 37 24 z M 23 28 L 23 30 L 31 30 L 31 28 L 23 28 z M 37 29 L 37 32 L 42 32 L 42 29 L 37 29 z M 6 30 L 19 30 L 19 44 L 6 44 L 6 30 z M 8 32 L 8 34 L 11 34 L 11 32 L 8 32 z M 14 32 L 14 34 L 17 34 L 17 32 L 14 32 z M 37 34 L 37 37 L 42 37 L 42 34 L 37 34 z M 27 35 C 28.116414 35 29 35.883586 29 37 C 29 38.116414 28.116414 39 27 39 C 25.883586 39 25 38.116414 25 37 C 25 35.883586 25.883586 35 27 35 z M 8 36 L 8 38 L 11 38 L 11 36 L 8 36 z M 14 36 L 14 38 L 17 38 L 17 36 L 14 36 z M 37 39 L 37 42 L 42 42 L 42 39 L 37 39 z M 8 40 L 8 42 L 11 42 L 11 40 L 8 40 z M 14 40 L 14 42 L 17 42 L 17 40 L 14 40 z"/></svg>
            <label for="ville" class="ml-2 font-roboto">Ville</label>
        </div>
        <input class="border-b focus:outline-none focus:border-premier_bleu w-full py-2 px-2 no-outline  ring-gray-300 font-mono" type="text" id="ville" name="ville" required>
       

    
    

            <div class="flex flex-col  py-1 mt-8">
            <div class="flex items-center mb-6">
        
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="16px" height="16px"><path d="M 15 3 C 13.35499 3 12 4.3549904 12 6 C 12 7.6450096 13.35499 9 15 9 C 15.194918 9 15.38531 8.979636 15.570312 8.9433594 L 20.117188 17.470703 A 1.0004591 1.0004591 0 1 0 21.882812 16.529297 L 17.287109 7.9121094 C 17.725149 7.3901321 18 6.7276221 18 6 C 18 4.3549904 16.64501 3 15 3 z M 35 3 C 33.35499 3 32 4.3549904 32 6 C 32 6.7276221 32.274851 7.3901321 32.712891 7.9121094 L 28.117188 16.529297 A 1.0004591 1.0004591 0 1 0 29.882812 17.470703 L 34.429688 8.9433594 C 34.61469 8.979636 34.805082 9 35 9 C 36.64501 9 38 7.6450096 38 6 C 38 4.3549904 36.64501 3 35 3 z M 15 5 C 15.564129 5 16 5.4358706 16 6 C 16 6.5641294 15.564129 7 15 7 C 14.435871 7 14 6.5641294 14 6 C 14 5.4358706 14.435871 5 15 5 z M 35 5 C 35.564129 5 36 5.4358706 36 6 C 36 6.5641294 35.564129 7 35 7 C 34.435871 7 34 6.5641294 34 6 C 34 5.4358706 34.435871 5 35 5 z M 25.908203 20 C 23.461586 20 21.497438 20.617231 20.119141 21.777344 C 18.740844 22.937456 18.023322 24.625038 17.988281 26.451172 C 17.971141 27.347042 18.160834 28.300661 18.398438 29.261719 C 18.132856 29.667737 17.949586 30.160489 18.023438 30.822266 C 18.108358 31.580636 18.298329 32.152191 18.619141 32.591797 C 18.734466 32.749826 18.922639 32.751115 19.070312 32.863281 C 19.202869 33.73447 19.566273 34.522213 19.994141 35.177734 C 20.251175 35.571528 20.518513 35.918959 20.761719 36.197266 C 20.839559 36.286346 20.937504 36.34106 21.001953 36.414062 L 21.001953 38.169922 C 20.871663 38.485192 20.559281 38.807502 19.910156 39.164062 C 19.228803 39.538326 18.293692 39.903885 17.324219 40.369141 C 16.354745 40.834396 15.336142 41.406431 14.509766 42.294922 C 13.683389 43.183413 13.087884 44.409675 13.001953 45.943359 A 1.0001 1.0001 0 0 0 14.001953 47 L 36.001953 47 A 1.0001 1.0001 0 0 0 37 45.943359 C 36.91378 44.409681 36.316718 43.183441 35.490234 42.294922 C 34.663751 41.406403 33.647274 40.834462 32.677734 40.369141 C 31.708194 39.903819 30.771254 39.538308 30.089844 39.164062 C 29.441273 38.807854 29.130517 38.486589 29 38.171875 L 29 36.398438 C 29.06482 36.320797 29.171975 36.259335 29.251953 36.164062 C 29.493502 35.876323 29.758698 35.520002 30.013672 35.119141 C 30.436879 34.45379 30.797961 33.678787 30.931641 32.824219 C 31.079516 32.712036 31.267395 32.710892 31.382812 32.552734 C 31.703885 32.11277 31.894176 31.541668 31.978516 30.783203 C 32.032446 30.299951 31.984116 29.858405 31.826172 29.466797 C 31.790852 29.379237 31.657328 29.339289 31.609375 29.253906 C 31.800296 28.52205 31.971731 27.776346 31.988281 27.021484 C 32.019201 25.61183 31.622276 24.205177 30.677734 23.136719 C 29.877439 22.231431 28.631231 21.717953 27.177734 21.552734 L 26.847656 20.654297 A 1.0001 1.0001 0 0 0 25.908203 20 z M 5 22 C 3.3549904 22 2 23.35499 2 25 C 2 26.64501 3.3549904 28 5 28 C 6.2931586 28 7.3951413 27.15733 7.8125 26 L 15 26 A 1.0001 1.0001 0 1 0 15 24 L 7.8125 24 C 7.3951413 22.84267 6.2931586 22 5 22 z M 45 22 C 43.706841 22 42.604859 22.84267 42.1875 24 L 35 24 A 1.0001 1.0001 0 1 0 35 26 L 42.1875 26 C 42.604859 27.15733 43.706841 28 45 28 C 46.64501 28 48 26.64501 48 25 C 48 23.35499 46.64501 22 45 22 z M 25.244141 22.089844 L 25.490234 22.757812 A 1.0001 1.0001 0 0 0 26.427734 23.412109 C 27.800914 23.412109 28.63023 23.841348 29.179688 24.462891 C 29.729145 25.084433 30.010358 25.97217 29.988281 26.978516 C 29.972651 27.691282 29.838437 28.45335 29.613281 29.171875 A 1.0001 1.0001 0 0 0 29.976562 30.275391 C 29.988283 30.319371 30.009264 30.390034 29.990234 30.560547 C 29.933544 31.070316 29.817203 31.286094 29.775391 31.347656 A 1.0001 1.0001 0 0 0 29.041016 32.310547 C 29.041016 32.587361 28.737724 33.397894 28.326172 34.044922 C 28.120396 34.368436 27.898966 34.6646 27.720703 34.876953 C 27.54244 35.089306 27.280315 35.258117 27.509766 35.128906 A 1.0001 1.0001 0 0 0 27 36 L 27 38.447266 A 1.0001 1.0001 0 0 0 27.001953 38.488281 C 26.93728 38.527202 26.900324 38.556674 26.802734 38.605469 C 26.421991 38.79584 25.833333 39 25 39 C 24.166667 39 23.578009 38.79584 23.197266 38.605469 C 23.101515 38.557594 23.065966 38.528621 23.001953 38.490234 A 1.0001 1.0001 0 0 0 23.001953 38.447266 L 23.001953 36 A 1.0001 1.0001 0 0 0 22.488281 35.126953 C 22.687982 35.238344 22.444001 35.082743 22.267578 34.880859 C 22.091159 34.678978 21.872887 34.396892 21.669922 34.085938 C 21.263992 33.464025 20.962891 32.689748 20.962891 32.349609 A 1.0001 1.0001 0 0 0 20.228516 31.386719 C 20.186456 31.324819 20.068812 31.10948 20.011719 30.599609 C 19.992045 30.423334 20.036386 30.325893 20.060547 30.289062 A 1.0001 1.0001 0 0 0 20.0625 30.287109 A 1.0001 1.0001 0 0 0 20.394531 29.232422 C 20.106362 28.238192 19.972633 27.308307 19.988281 26.490234 C 20.014241 25.137368 20.478797 24.089231 21.40625 23.308594 C 22.219433 22.624138 23.531278 22.200219 25.244141 22.089844 z M 5 24 C 5.5438301 24 5.9584257 24.408812 5.9882812 24.943359 A 1.0001 1.0001 0 0 0 5.9882812 25.058594 C 5.957487 25.592159 5.543157 26 5 26 C 4.4358706 26 4 25.564129 4 25 C 4 24.435871 4.4358706 24 5 24 z M 45 24 C 45.564129 24 46 24.435871 46 25 C 46 25.564129 45.564129 26 45 26 C 44.45617 26 44.041574 25.591188 44.011719 25.056641 A 1.0001 1.0001 0 0 0 44.011719 24.941406 C 44.042513 24.407841 44.456843 24 45 24 z M 21.951172 40.175781 C 22.070687 40.251371 22.154975 40.320652 22.302734 40.394531 C 22.921991 40.70416 23.833333 41 25 41 C 26.166667 41 27.078009 40.70416 27.697266 40.394531 C 27.845025 40.320652 27.929313 40.251371 28.048828 40.175781 C 28.38153 40.464131 28.749921 40.710894 29.126953 40.917969 C 29.988293 41.391036 30.93754 41.751946 31.8125 42.171875 C 32.68746 42.591804 33.474078 43.063409 34.027344 43.658203 C 34.370679 44.027308 34.601894 44.478711 34.771484 45 L 15.230469 45 C 15.399943 44.47877 15.631382 44.027229 15.974609 43.658203 C 16.527702 43.063538 17.314552 42.591745 18.189453 42.171875 C 19.064354 41.752005 20.011681 41.391112 20.873047 40.917969 C 21.25009 40.710861 21.618462 40.464102 21.951172 40.175781 z"/></svg>
    <label for="roles" class="ml-2 font-roboto">Commerciaux</label>
</div>
    <div>
        <button id="dropdownButton1" type="button" class="inline-flex justify-between w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring focus:border-blue-300">
            <span>Sélectionnez un ou plusieurs commerciaux</span>
            <svg class="w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
    </div>
    <div id="dropdownContent1" class="hidden  right-0 z-10 w-56 mt-2 bg-white border border-gray-300 rounded-md shadow-lg">
        <div class="py-1">
        <?php
        if (isset($commerciaux) && is_array($commerciaux)) {
            foreach ($commerciaux as $commercial) {
                echo '<label class="flex items-center px-4 py-2 text-sm">
                        <input type="checkbox" name="commerciaux[]" value="' . $commercial['id_personne'] .'"  class="form-checkbox" />
                        <span class="ml-2">' . $commercial['prenom'] . ' ' . $commercial['nom'] . '</span>
                        
                      </label>';
            }
        }
        ?>
        </div>
    </div>
</div>

<button type="button" id="closeEditModalButton" class="closeModalEdit absolute top-0 right-0  m-2 p-2  rounded-full hover:bg-gray-300 focus:outline-none focus:ring focus:border-blue-300">        <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
</button>
            <button type="submit" class=" inline-flex justify-center w-32 mt-24 ml-20 h-10 text-white bg-premier_bleu hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-premier_bleu dark:hover:bg-second_bleu dark:focus:ring-blue-800 font-roboto">Créer</button>

           
        </form>
        
    </div>
    

</div>





</div>

                    