<?php require "view_begin.php"; ?>

<?php require "./nav.php"; ?>


<div class="flex-1 ml-60 p-4">

    <div class="max-w-1xl mx-auto">
<h2 class="text-troisieme_bleu text-[40px] font-normal font-inter"> Bon de livraison </h2>
<div class="flex justify-between">
    <h3 class="text-troisieme_bleu text-s font-thin">Créer et sauvegarder votre bon de livraison</h3>
    <?php require "view_avatar.php"; ?>
</div>
<?php

$currentMonth = date('n');
$currentYear = date('Y');
?>
                                   
           <div class="container bg-container rounded-xl px-10 py-12 my-6">
           <h5 class="-mt-6 mb-6 text-base font-bold leading-6 break-words font-inter">Calendrier</h5>
    

         





    <div class="flex justify-between gap-x-20">
    <button type="button" class="inline-flex font-medium items-center  hover:bg-blue-200 dark:hover:bg-blue-200 px-5 py-2 rounded-lg gap-x-2 text-premier_bleu bg-blue-100/70 dark:bg-white-800"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" viewBox="0,0,256,256"
style="fill:#000000;">
<g fill="#718096" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8,8)"><path d="M7,5v23l1.59375,-1.1875l7.40625,-5.5625l7.40625,5.5625l1.59375,1.1875v-23zM9,7h14v17l-6.40625,-4.8125l-0.59375,-0.4375l-0.59375,0.4375l-6.40625,4.8125z"></path></g></g>
</svg>Sauvegarder BDL</button>          
                                       <?php if($role ==='interlocuteur'):?>
                                        <form id="signerBDLForm" action="?controller=calendar&action=valid" method="post">
                                        <button type="submit" class="inline-flex font-medium items-center px-5 py-2 rounded-lg gap-x-2 text-green-500 hover:bg-green-200 dark:hover:bg-green-200 bg-green-100/70 dark:bg-white-800"> <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>Signer BDL</button>
                                        </form>
                                        <?php endif;?>
    </div>

           <div class="container mx-auto my-10 p-4 bg-white  rounded shadow">
            <div class="flex justify-between items-center mb-4">
             <button onclick="previousMonth()" class="text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="24px" height="24px"><g fill="#427d9d" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M12,2c-5.523,0 -10,4.477 -10,10c0,5.523 4.477,10 10,10c5.523,0 10,-4.477 10,-10c0,-5.523 -4.477,-10 -10,-10zM17,13h-6.586l2.293,2.293l-1.414,1.414l-4.707,-4.707l4.707,-4.707l1.414,1.414l-2.293,2.293h6.586z"></path></g></g></svg></button>
        
        <h1 class="text-2xl font-bold mb-4 calendar-title">
            <?= date('F Y', mktime(0, 0, 0, $currentMonth, 1, $currentYear));
            ?>
        </h1>
        <h2 id="titre_mois"> </h2>
        <button onclick="nextMonth()" class="text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="24px" height="24px"><g fill="#427d9d" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="translate(256,256) rotate(180) scale(10.66667,10.66667)"><path d="M12,2c-5.523,0 -10,4.477 -10,10c0,5.523 4.477,10 10,10c5.523,0 10,-4.477 10,-10c0,-5.523 -4.477,-10 -10,-10zM17,13h-6.586l2.293,2.293l-1.414,1.414l-4.707,-4.707l4.707,-4.707l1.414,1.414l-2.293,2.293h6.586z"></path></g></g></svg></button>
    </div>

    <div class="grid grid-cols-7">
       
    </div>

    <div class="grid grid-cols-7" id="calendar-container">
        <!-- JavaScript -->
    </div>
</div>

       </div>
        </div>
</div>
<!-- Modal -->
<div id="modal" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 hidden">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-md">
        <span class="text-2xl font-bold mb-4 block">Créer un compte rendu</span>

        <form action="?controller=calendar&action=add" onsubmit="submitForm(event)" class="flex flex-col h-full" method="post">
            <div class="flex-grow mb-4"> 
                <input type="hidden" name="jour" id="jour">
                <input type="hidden" name="mois" id="mo">
                <input type="hidden" name="annee" id="annee">
                <label for="commentaire" class="block text-sm font-semibold mb-2">Commentaire :</label>
                <input type="text" name="commentaire" id="commentaire" class="w-full border border-gray-300 p-2 mb-2">

            
        <label for="period" class="block text-sm font-semibold mb-2">Période:</label>
        <select name="period" id="period" onchange="toggleOptions()" required class="w-full border border-gray-300 p-2 mb-2">
            <!-- Utilisez la variable 'periodes' pour générer les options -->
            <?php foreach ($periodes as $periode): ?>

                
                <option value="<?= $periode['typeemission']; ?>"><?= $periode['typeemission']; ?></option>
            <?php endforeach; ?>
        </select>


<div id="heuresOption" class="hidden mt-4 mb-8">
    <label for="heure_depart">Heure d'arrivée:</label>
    <input type="time" name="heure_depart" id="heure_depart">

    <label for="heure_arrivee">Heure de départ:</label>
    <input type="time" name="heure_arrivee" id="heure_arrivee">
</div>

<div id="demiJourneeOption" class="hidden mt-4 mb-8">
    <input type="checkbox" name="matin" id="matin">
    <label for="matin">Matin</label>

    <input type="checkbox" name="soir" id="soir">
    <label for="soir">Soir</label>

    <label for="heure_depart_demi">Heure d'arrivée:</label>
    <input type="time" name="heure_depart_demi" id="heure_depart_demi">

    <label for="heure_arrivee_demi">Heure de départ:</label>
    <input type="time" name="heure_arrivee_demi" id="heure_arrivee_demi">

    <label for="heures_supplementaires_demi">Heures supplémentaires:</label>
    <input type="text" name="heures_supplementaires_demi" id="heures_supplementaires_demi">
</div>

<div id="journeeOption" class="hidden mt-4 mb-8">
    <label for="heures_supplementaires_journee">Heures supplémentaires:</label>
    <input type="text" name="heures_supplementaires_journee" id="heures_supplementaires_journee">
</div>
<div class="flex justify-end -mb-12 ">
                <button type="submit" class="text-white bg-premier_bleu hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-premier_bleu dark:hover:bg-second_bleu dark:focus:ring-blue-800 font-roboto" >Créer</button>
            </div>
        </form>
        
        <button type="button" onclick="closeModal()" class="mt-4 text-sm text-gray-500">Fermer</button>
    </div>
</div>


<script>
    
    let currentMonth = <?= date('n'); ?>;
    let currentYear = <?= date('Y'); ?>;
    let comments = {};
    let periodes = <?php echo json_encode($periodes); ?>;
    let bdlInfos = <?php echo json_encode($bdl); ?>;


    function isWeekend(day, month, year) {
        const dayOfWeek = new Date(year, month - 1, day).getDay();
        return dayOfWeek === 0 || dayOfWeek === 6; 
    }

    function loadCalendar(month, year) {
        let calendarContainer = document.getElementById('calendar-container');
    calendarContainer.innerHTML = '';  

    let calendarGrid = document.createElement('div');
    calendarGrid.classList.add('grid', 'grid-cols-7', 'gap-2');


    calendarContainer.appendChild(calendarGrid);
    const daysOfWeek = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
    for (let i = 0; i < daysOfWeek.length; i++) {
        calendarContainer.innerHTML += `<div class="h-16 flex items-center justify-center font-bold">${daysOfWeek[i]}</div>`;
    }
    let firstDayOfMonth = new Date(year, month - 1, 1).getDay();
    for (let i = 0; i < firstDayOfMonth; i++) {
        calendarContainer.innerHTML += '<div class="h-16"></div>';
    }
    

    // Afficher les jours du mois
    for (let day = 1; day <= new Date(year, month, 0).getDate(); day++) {
        let displayText = '';

            let periodText = ''; 
            let heureArriveeText = '';
            let heureDepartText = '';
            let isWeekendDay = isWeekend(day, month, year);

            let currentDate = new Date(year, month - 1, day + 1);
    let formattedCurrentDate = currentDate.toISOString().split('T')[0];
    
    let periodesJour = periodes.filter(entry => entry.mois === formattedCurrentDate);
    console.log(periodesJour.typeemission);
    if (periodesJour.length > 0) {
    for (let periode of periodesJour) {
        periodText += `<span class="px-3 py-1 text-blue-500 rounded-full gap-x-2 bg-blue-100/80 dark:bg-white-800">${periode.typeemission}</span>`;
        if (periode.typeemission === 'Creneau') {
        heureArriveeText = `Arrivée: ${periode.id_composante}`;
        heureDepartText = `Départ: ${periode.heure_depart}`;
    }    }
}    let commentairesJour = bdlInfos.filter(entry => entry.mois === formattedCurrentDate);
    if (commentairesJour.length > 0) {
        for (let commentaire of commentairesJour) {
            displayText += `<span class="  py-1 text-red-500">${commentaire.commentaire}</span>`;
        }
    }



            let currentClass = (day === new Date().getDate() && month === currentMonth && year === currentYear) ? 'bg-blue-200' : '';
            let cursorClass = isWeekendDay ? 'cursor-default' : 'cursor-pointer'; // Utilisez la classe Tailwind pour le curseur
            let weekendClass = isWeekendDay ? 'bg-gray-200' : ''; // Ajoutez une classe pour griser le fond des jours de week-end


    calendarContainer.innerHTML += `
   <div class="h-32 w-full relative border border-gray-300 p-2 ${cursorClass} ${weekendClass} ${currentClass}" 
        onclick="${isWeekendDay ? '' : '<?php if($role==="prestataire"): ?>openModal(' + day + ')<?php endif; ?>'}">
      <span class="block ${isCurrentDay(day) ? 'current-day' : ''}">${day}</span>
      <div class="event">${displayText}</div>
      <div class="periods">${periodText}</div>
   </div>
`;


        }



    let lastDayOfMonth = new Date(year, month, 0).getDay();
    for (let i = lastDayOfMonth; i < 6; i++) {
        calendarContainer.innerHTML += '<div class="h-32"></div>';
    }

    calendarContainer.innerHTML += '</div>';

    currentMonth = month;
    currentYear = year;

   
    document.querySelector('.calendar-title').innerText = new Intl.DateTimeFormat('fr-FR', { month: 'long', year: 'numeric' }).format(new Date(currentYear, currentMonth - 1, 1));
}

    // Fonction pour charger le mois précédent
    function previousMonth() {
    currentMonth--;
    if (currentMonth === 0) {
        currentMonth = 12;
        currentYear--;
    }
    loadCalendar(currentMonth, currentYear);
    updateCurrentDayColor();
     abc = currentMonth;
}

let abc = currentMonth;



let titre=document.getElementById('titre_mois');
    titre.innerHTML=`${abc}`;
    let moissub=document.getElementById('mois');


function nextMonth() {
    currentMonth++;
    if (currentMonth === 13) {
        currentMonth = 1;
        currentYear++;
        
    }
    loadCalendar(currentMonth, currentYear);
    updateCurrentDayColor();
    abc = currentMonth;
    titre.textContent = `${abc}`;
    moissub.setAttribute("placeholder",`${abc}`);}

function updateCurrentDayColor() {
    let calendarContainer = document.getElementById('calendar-container');
    let currentDay = new Date().getDate();
    let currentMonthElement = calendarContainer.querySelector(`.current-month .current-day`);

    if (currentMonthElement) {
        currentMonthElement.classList.remove('bg-blue-200');
    }

    let newCurrentDayElement = calendarContainer.querySelector(`.current-month [onclick="openModal(${currentDay})"]`);

    if (newCurrentDayElement) {
        newCurrentDayElement.classList.add('bg-blue-200');
    }
}


    function openModal(day) {
        document.getElementById('jour').value = day;
    document.getElementById('mo').value = currentMonth;
    document.getElementById('annee').value = currentYear;
        document.getElementById('commentaire').value=comments[`${currentYear}-${currentMonth}-${day}`];
    console.log("Périodes choisies :", periodes);

    document.getElementById('modal').classList.remove('hidden');
    console.log(new Date(currentYear, currentMonth, 1).getMonth());
   

}
   function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}


    loadCalendar(currentMonth, currentYear);

   // (** FAIT SUR CHAT GPT**)
   function toggleOptions() {
    let period = document.getElementById('period').value;
    let heuresOption = document.getElementById('heuresOption');
    let demiJourneeOption = document.getElementById('demiJourneeOption');
    let journeeOption = document.getElementById('journeeOption');
    let heuresSupplementairesJourneeInput = document.getElementById('heures_supplementaires_journee');
    let heuresSupplementairesDemiInput = document.getElementById('heures_supplementaires_demi');

    heuresOption.style.display = 'none';
    demiJourneeOption.style.display = 'none';
    journeeOption.style.display = 'none';

    heuresSupplementairesJourneeInput.disabled = true;
    heuresSupplementairesDemiInput.disabled = true;


    let selectedPeriode = periodes.find(p => p.typeemission === period);
    if (selectedPeriode) {
        if (selectedPeriode.typeemission === 'Journee') {
            journeeOption.style.display = 'block';
            heuresSupplementairesJourneeInput.disabled = false;
        } else if (selectedPeriode.typeemission === 'Demijournee') {
            demiJourneeOption.style.display = 'block';
            heuresSupplementairesDemiInput.disabled = false;
        } else if (selectedPeriode.typeemission === 'Creneau') {
            heuresOption.style.display = 'block';
        }
    }
  
}

// (** FAIT SUR CHAT GPT**)
function submitForm(event) {
    // Récupérer l'élément 'jour'
    let jourElement = document.getElementById('jour');
    let monthElement = abc;
    console.log(jourElement.value);
    console.log(monthElement);
 

    

let calendarDayElement = document.querySelector(`[onclick="openModal(${jour})"]`);
if (calendarDayElement) {
    calendarDayElement.innerHTML = `<span class="block ${isCurrentDay(jour) ? 'current-day' : ''}">${jour}</span><div class="event overflow-y-hidden overflow-x-auto">${displayText}</div>`;
}


comments[`${currentYear}-${currentMonth}-${jour}`] = commentaire;

    closeModal();
}


    // Fonction pour vérifier si le jour est le jour actuel
    function isCurrentDay(day) {
        return day == new Date().getDate() && currentMonth === new Date().getMonth() + 1 && currentYear === new Date().getFullYear();
    }
    function initialize() {
    toggleOptions();
}

function previewComment(date) {
    let comment = comments[date];
    if (comment) {
        alert(`Commentaire pour le ${date}: ${comment}`);
    }
}



// Appeler la fonction d'initialisation au chargement de la page
document.addEventListener("DOMContentLoaded", function () {
    initialize();
});

</script>


<?php require "view_end.php"; ?>


