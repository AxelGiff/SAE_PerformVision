<?php require "view_begin.php"; ?>

<?php require "./nav.php"; ?>


<div class="flex-1 ml-60 p-4">

    <div class="max-w-1xl mx-auto">
<h2 class="text-troisieme_bleu text-[40px] font-normal font-inter"> Profil </h2>
<div class="flex justify-between">
    <h3 class="text-troisieme_bleu text-s font-thin">Gérer mon profil</h3>
    <?php require "view_avatar.php"; ?>
</div>
</div>

<div class="container bg-container rounded-xl px-20 py-24 my-6">
<h5 class="-mt-14 mb-6 text-base font-bold leading-6 break-words font-inter">Profil</h5>
<div id="formulaire_connexion" class="w-full flex flex-col h-200 max-w-lg px-10 py-8 mx-auto bg-white border rounded-lg shadow-2xl items-center">
        <h2 class="text-titre_p leading-5 flex justify-center font-bold mt-14 mb-10 text-titre font-roboto_sl tracking-wider">Modifier mon profil</h2>
        <form action="?controller=profil&action=update" method="post" class="max-w-md mx-auto">
           
        <div class="flex items-center py-1">
        <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="15" height="15">
            <path d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z" />
            <path d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z" />
        </svg>
        <label for="nom" class="ml-2 font-roboto">Nom</label>
    </div>
    <input class="border-b focus:outline-none focus:border-premier_bleu w-full py-2 px-2 no-outline  ring-gray-300 font-mono" type="text" id="nom" name="nom" required>

    <div class="flex items-center py-1 mt-8">
    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="15" height="15">
            <path d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z" />
            <path d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z" />
        </svg>
        <label class="block py-1 ml-2 font-roboto" for="prenom">Prénom</label>
    </div>
    <input class="border-b focus:outline-none focus:border-premier_bleu w-full py-2 px-2 no-outline  ring-gray-300 font-mono" type="text" id="prenom" name="prenom" required>
            <div class="flex items-center py-1 mt-8">
            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="15" height="15"><path d="M19,8.424V7A7,7,0,0,0,5,7V8.424A5,5,0,0,0,2,13v6a5.006,5.006,0,0,0,5,5H17a5.006,5.006,0,0,0,5-5V13A5,5,0,0,0,19,8.424ZM7,7A5,5,0,0,1,17,7V8H7ZM20,19a3,3,0,0,1-3,3H7a3,3,0,0,1-3-3V13a3,3,0,0,1,3-3H17a3,3,0,0,1,3,3Z"/><path d="M12,14a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V15A1,1,0,0,0,12,14Z"/></svg>
            <label class="block py-1 ml-2 font-roboto" for="password">
           
        Mot de passe</label>
        </div>
    
            <input class="border-b focus:outline-none focus:border-premier_bleu no-outline w-full py-2 px-2 font-mono" type="password" id="password" name="password" required>


            <div class="flex items-center py-1 mt-8">
            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="15" height="15"><path d="M19,8.424V7A7,7,0,0,0,5,7V8.424A5,5,0,0,0,2,13v6a5.006,5.006,0,0,0,5,5H17a5.006,5.006,0,0,0,5-5V13A5,5,0,0,0,19,8.424ZM7,7A5,5,0,0,1,17,7V8H7ZM20,19a3,3,0,0,1-3,3H7a3,3,0,0,1-3-3V13a3,3,0,0,1,3-3H17a3,3,0,0,1,3,3Z"/><path d="M12,14a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V15A1,1,0,0,0,12,14Z"/></svg>
            <label class="block py-1 ml-2 font-roboto" for="password">
           
        Confirmer le mot de passe</label>
        <?php if (isset($data['error']) && !empty($data['error'])) : ?>
    <p class="text-red-500"><?php echo $data['error']; ?></p>
<?php endif; ?>
        </div>
    

        <input class="border-b focus:outline-none focus:border-premier_bleu no-outline w-full py-2 px-2 font-mono" type="password" id="password_confirm" name="password_confirm" required>

            <button type="submit" class=" mt-12 w-full text-white bg-premier_bleu hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-premier_bleu dark:hover:bg-second_bleu dark:focus:ring-blue-800 font-roboto">Modifier</button>
          

        </form>
       
    </div>

</div>
</div>


<?php require "view_end.php"; ?>
