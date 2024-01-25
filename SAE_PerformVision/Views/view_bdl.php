<?php require "view_begin.php"; ?>

<?php require "./nav.php"; ?>


<div class="flex-1 ml-60 p-4">

    <div class="max-w-1xl mx-auto">
<h2 class="text-troisieme_bleu text-[40px] font-normal font-inter"> Bons de livraisons </h2>
<div class="flex justify-between">
    <h3 class="text-troisieme_bleu text-s font-thin">Consulter les BDLs</h3>
    <?php require "view_avatar.php"; ?>
</div>


<div class="container bg-container rounded-xl px-20 py-24 my-6">
<h5 class="-mt-14 mb-6 text-base font-bold leading-6 break-words font-inter">Historique des BDLs</h5>

<section class="container px-4 mx-auto">
    <div class="flex flex-col">
        <div class="-mx-4 my-12 overflow-x-auto sm:-mx-6 lg:-mx-12">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-second_bleu">
                            <tr>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-white dark:text-white">
                                    <div class="flex items-center gap-x-3">
                                        <input type="checkbox" class="text-blue-500 border-gray-300 rounded dark:bg-gray-900 dark:ring-offset-gray-900 dark:border-gray-700">
                                        <button class="flex items-center gap-x-2">
                                            <span>ID Composante</span>

                                            <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                            </svg>
                                        </button>
                                    </div>
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm  font-normal text-left rtl:text-right text-white dark:text-white">
                                    Date
                                </th>

                                <th scope="col" class="px-4  py-3.5 text-sm font-normal text-left rtl:text-righttext-white dark:text-white">
                                    Prestataires
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white dark:text-white">
                                    Consultation
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm flex justify-center font-normal text-left rtl:text-right text-white dark:text-white">
                                    Statut
                                </th>

                                
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-white-200 dark:divide-white-700 dark:bg-white-900">
                        <?php foreach ($bdl as $bd): ?>
    <tr>
        <td class="px-4 py-4 text-sm font-medium text-BLU-700 dark:text-black-200 whitespace-nowrap">
            <!-- Afficher les détails du BDL -->
            <div class="inline-flex items-center gap-x-3">
                <input type="checkbox" class="text-blue-500 border-gray-300 rounded dark:bg-gray-900 dark:ring-offset-gray-900 dark:border-gray-700">
                <span>#<?= $bd['id_composante'],' ', $bd['nomcomposante'] ?></span> <!-- Supposons que 'id' est le nom de la colonne dans votre base de données -->
            </div>
        </td>
        <td class="px-4 py-4 text-sm text-gray-500 dark:text-black-300 whitespace-nowrap"><?= $bd['mois'] ?></td>
        <!-- Afficher d'autres détails du BDL de manière similaire -->
        <td class="px-4 py-4 text-sm text-gray-500 dark:text-black-300 whitespace-nowrap">
            <div class="flex items-center gap-x-2">
                <div>
                    <h2 class="text-sm ml-4 font-medium text-gray-800 dark:text-black "><?= $bd['nom_prestataire'] . ' ' . $bd['prenom_prestataire'] ?></h2>
                </div>
            </div>
        </td>
        <td class="px-4 py-4 inline-block text-sm text-gray-500 dark:text-black-300 whitespace-nowrap">
            <a href="?controller=calendar&action=affiche&id_composante=<?php echo $bd['id_composante']; ?>&mois=<?php echo$bd['mois'];?>"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></a>
        </td>
        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
    <div class="flex items-center justify-center gap-x-2">
        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2
            <?php if($bd['statut'] === 'Valide'): ?>
                text-emerald-500 bg-emerald-100/80 dark:bg-white-800
            <?php else: ?>
                text-orange-500 bg-orange-100/80 dark:bg-white-800
            <?php endif; ?>
        ">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <?php if($role == 'interlocuteur' || $role =='commercial' || $role=='prestataire' || $role==='gestionnaire'): ?>
                <h2 class="text-sm font-bold"><?= $bd['statut'] ?></h2>
            <?php endif; ?>
        </div>
    </div>
</td>
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
</div>

<li> 
  
<?php if(isset($role)): ?>
<?php echo "Vous n'êtes qu'un " . $role . " vous ne pouvez pas avoir accès à la liste des bdl de tout le monde" ?>

<?php endif; ?> 

</li>

<?php require "view_end.php"; ?>
