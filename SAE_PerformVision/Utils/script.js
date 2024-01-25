  
  const toggleButtonClasses = (buttonId, addClass, removeClass) => {
    const button = document.getElementById(buttonId);
    if (button) {
      button.classList.add(addClass);
      button.classList.remove(removeClass);
    }
  };
  document.addEventListener('DOMContentLoaded', function() {
    

   
    document.getElementById('btnFrench').addEventListener('click', function() {
      toggleButtonClasses('btnFrench', 'bg-second_bleu', 'bg-indigo-100/90');
      toggleButtonClasses('btnFrench', 'text-white', 'text-troisieme_bleu');
      toggleButtonClasses('btnEnglish', 'bg-indigo-100/90', 'bg-second_bleu');
      toggleButtonClasses('btnEnglish', 'text-troisieme_bleu', 'text-white');
    });

    document.getElementById('btnEnglish').addEventListener('click', function() {
      toggleButtonClasses('btnEnglish', 'bg-second_bleu', 'bg-indigo-100/90');
      toggleButtonClasses('btnEnglish', 'text-white', 'text-troisieme_bleu');
      toggleButtonClasses('btnFrench', 'bg-indigo-100/90', 'bg-second_bleu');
      toggleButtonClasses('btnFrench', 'text-troisieme_bleu', 'text-white');
    });
    
    document.getElementById('btnDark').addEventListener('click', function() {
      toggleButtonClasses('btnDark', 'bg-second_bleu', 'bg-indigo-100/90');
      toggleButtonClasses('btnDark', 'text-white', 'text-troisieme_bleu');
      toggleButtonClasses('btnLight', 'bg-indigo-100/90', 'bg-second_bleu');
      toggleButtonClasses('btnLight', 'text-troisieme_bleu', 'text-white');
    });

    
    document.getElementById('btnLight').addEventListener('click', function() {
      toggleButtonClasses('btnLight', 'bg-second_bleu', 'bg-indigo-100/90');
      toggleButtonClasses('btnLight', 'text-white', 'text-troisieme_bleu');
      toggleButtonClasses('btnDark', 'bg-indigo-100/90', 'bg-second_bleu');
      toggleButtonClasses('btnDark', 'text-troisieme_bleu', 'text-white');
    });
     
  });
  document.addEventListener("DOMContentLoaded", function () {

    let btnBdl=document.getElementById('btn-bdl');
    let btnClient=document.getElementById('btn-clients');
    let btnMember=document.getElementById('btn-membres');
    let currentIndex = 0;

    function showSlide(index) {
      document.querySelectorAll('.carousel > div').forEach((slide, i) => {
          slide.style.display = i === index ? 'block' : 'none';
      });
    }

    function updateCurrentIndex(index) {
        currentIndex = index;
        showSlide(currentIndex);
    }

    // Utilisez les identifiants spécifiques pour vos boutons
    btnBdl.addEventListener('click', function () {
        updateCurrentIndex(0); // 0 correspond à l'index du nombre de BDLs
        toggleButtonClasses('btn-bdl', 'bg-white', 'bg-gray-200');
        toggleButtonClasses('btn-clients', 'bg-gray-200', 'bg-white');
        toggleButtonClasses('btn-membres', 'bg-gray-200', 'bg-white');


    });

    btnClient.addEventListener('click', function () {
        updateCurrentIndex(1); // 1 correspond à l'index du nombre de clients
        toggleButtonClasses('btn-clients', 'bg-white', 'bg-gray-200');
        toggleButtonClasses('btn-bdl', 'bg-gray-200', 'bg-white');
        toggleButtonClasses('btn-membres', 'bg-gray-200', 'bg-white');

    });

    btnMember.addEventListener('click', function () {
        updateCurrentIndex(2); // 2 correspond à l'index du nombre de membres
        toggleButtonClasses('btn-membres', 'bg-white', 'bg-gray-200');
        toggleButtonClasses('btn-clients', 'bg-gray-200', 'bg-white');
        toggleButtonClasses('btn-bdl', 'bg-gray-200', 'bg-white');

    });

    showSlide(currentIndex);
});

document.addEventListener('DOMContentLoaded', function() {

   document.getElementById('dropdownButton1').addEventListener('click', function () {
    var dropdownContent = document.getElementById('dropdownContent1');
    dropdownContent.classList.toggle('hidden');
});

document.addEventListener('click', function (event) {
    var dropdownButton = document.getElementById('dropdownButton1');
    var dropdownContent = document.getElementById('dropdownContent1');
    
    if (!dropdownButton.contains(event.target) && !dropdownContent.contains(event.target)) {
        dropdownContent.classList.add('hidden');
    }
  });

  document.getElementById('dropdownButton2').addEventListener('click', function () {
    var dropdownContent = document.getElementById('dropdownContent2');
    dropdownContent.classList.toggle('hidden');
}); 

  document.addEventListener('click', function (event) {
      var dropdownButton = document.getElementById('dropdownButton2');
      var dropdownContent = document.getElementById('dropdownContent2');
      
      if (!dropdownButton.contains(event.target) && !dropdownContent.contains(event.target)) {
          dropdownContent.classList.add('hidden');
      }
  });
  
  document.getElementById('dropdownButton3').addEventListener('click', function () {
    var dropdownContent = document.getElementById('dropdownContent3');
    dropdownContent.classList.toggle('hidden');
}); 
document.addEventListener('click', function (event) {
  var dropdownButton = document.getElementById('dropdownButton3');
  var dropdownContent = document.getElementById('dropdownContent3');
  
  if (!dropdownButton.contains(event.target) && !dropdownContent.contains(event.target)) {
      dropdownContent.classList.add('hidden');
  }
});
}); 

document.addEventListener('DOMContentLoaded', function () {
  function openModal() {
    let modal = document.getElementById('modal');
    modal.classList.remove('hidden');
  }

  function closeModal() {
    console.log('Close Modal called');
    document.getElementById('modal').classList.add('hidden');
  }


  let btnClose = document.getElementById('closeModal');
  btnClose.addEventListener('click', closeModal);

  let btn = document.getElementById('btnModal');
  btn.addEventListener('click', openModal);



  let modalEdit = document.getElementById('editModal');

  function openModalEdit() {
    modalEdit.classList.remove('hidden');
  }

  
 
  function closeModalEdit() {
    modalEdit.classList.add('hidden');
  }

  
  let closeEditModalButton = document.getElementById('closeEditModalButton');
  closeEditModalButton.addEventListener('click', closeModalEdit);

  let btns = document.querySelectorAll('.btnModalEdit');
  btns.forEach(function (btn) {
    btn.addEventListener('click', openModalEdit);
  });

 




 
});
