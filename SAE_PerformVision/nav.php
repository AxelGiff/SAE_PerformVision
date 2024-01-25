
<?php $currentController = isset($_GET['controller']) ? $_GET['controller'] : '';
?>

<div class="flex">

<aside class="fixed inset-y-0 left-0 bg-second_bleu shadow-md max-h-screen w-60">
    <div class="flex flex-col justify-between h-full">
      <div class="flex-grow">
        <div class="px-4 py-6 text-center">
        <h1 class="text-center text-white text-2xl font-inter">Perform Vision</h1>
        </div>
        <div class="mt-12 p-6 flex justify-self-end">
          <ul class="space-y-14">
            <li>
              <a href="?controller=tb&action=tb" id="btnTb" class="flex items-center <?= ($currentController === "tb" ) ? 'bg-troisieme_bleu text-quatrieme_bleu py-4' : 'bg-second_bleu text-gris hover:bg-quatrieme_bleu py-3' ?> rounded-xl font-bold text-sm text-gris py-3 px-4">
                
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="16px" height="16px" class="text-lg mr-4"><g fill="#d0d2da" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8,8)"><path d="M4,0h7c2.216,0 4,1.784 4,4v7c0,2.216 -1.784,4 -4,4h-7c-2.216,0 -4,-1.784 -4,-4v-7c0,-2.216 1.784,-4 4,-4zM21,0h7c2.216,0 4,1.784 4,4v7c0,2.216 -1.784,4 -4,4h-7c-2.216,0 -4,-1.784 -4,-4v-7c0,-2.216 1.784,-4 4,-4zM4,17h7c2.216,0 4,1.784 4,4v7c0,2.216 -1.784,4 -4,4h-7c-2.216,0 -4,-1.784 -4,-4v-7c0,-2.216 1.784,-4 4,-4zM21,17h7c2.216,0 4,1.784 4,4v7c0,2.216 -1.784,4 -4,4h-7c-2.216,0 -4,-1.784 -4,-4v-7c0,-2.216 1.784,-4 4,-4z"></path></g></g></svg>Tableau de bord
              </a>
            </li>
            <li>
              <a href="?controller=bdl&action=form_add" id="btnBdl"  class="flex <?= ($currentController === "bdl" ) ? 'bg-troisieme_bleu text-quatrieme_bleu py-4' : 'bg-second_bleu text-gris hover:bg-quatrieme_bleu py-3' ?> rounded-xl font-bold text-sm text-gris py-3 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="#d0d2da" class="text-lg mr-4" viewBox="0 0 16 16">
                  <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z"/>
                </svg>Bons de livraison
              </a>
            </li>
            <li>
            <a href="?controller=clients&action=pagination" class="flex <?= ($currentController === "clients" || $currentController === "calendar") ? 'bg-troisieme_bleu text-quatrieme_bleu py-4' : 'bg-second_bleu text-gris hover:bg-quatrieme_bleu py-3' ?> rounded-xl font-bold text-sm text-gris py-3 px-4">
			<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" class="text-lg mr-4" fill="#d0d2da" viewBox="0 0 30 30">
    		<path	path d="M 9 4 C 6.239 4 4 6.239 4 9 L 4 10 C 4 12.761 6.239 15 9 15 C 11.761 15 14 12.761 14 10 L 14 9 C 14 6.239 11.761 4 9 4 z M 21 4 C 18.239 4 16 6.239 16 9 L 16 10 C 16 12.761 18.239 15 21 15 C 23.761 15 26 12.761 26 10 L 26 9 C 26 6.239 23.761 4 21 4 z M 21 6 C 22.654 6 24 7.346 24 9 L 24 10 C 24 11.654 22.654 13 21 13 C 19.346 13 18 11.654 18 10 L 18 9 C 18 7.346 19.346 6 21 6 z M 8.9980469 17 C 5.7200469 17 1.5146875 18.874062 0.3046875 20.914062 C -0.4423125 22.174062 0.26909375 24 1.4960938 24 L 13.496094 24 L 16.503906 24 L 28.503906 24 C 29.730906 24 30.443313 22.174063 29.695312 20.914062 C 28.484313 18.874062 24.276047 17 20.998047 17 C 19.047658 17 16.780902 17.671584 15 18.638672 C 13.21859 17.67114 10.948987 17 8.9980469 17 z M 20.998047 19 C 23.768047 19 27.207609 20.640594 27.974609 21.933594 C 27.985609 21.951594 27.990141 21.975 27.994141 22 L 17.992188 22 C 17.982946 21.627707 17.893464 21.251138 17.693359 20.914062 C 17.496485 20.582142 17.198019 20.259134 16.859375 19.943359 C 18.140889 19.393039 19.646958 19 20.998047 19 z"></path>
			</svg>Clients
              </a>
            </li>

        <?php
          // ...

          // Vérifiez si le rôle courant est "prestataire"
          $isRestrictedRole = in_array($role, ["prestataire", "interlocuteur","client"]);

          // Utilisez cette variable pour déterminer la classe CSS à appliquer
          $adminClass = (!$isRestrictedRole && $currentController === "admin") ? 'bg-troisieme_bleu text-quatrieme_bleu py-4' : 'bg-second_bleu text-gris hover:bg-quatrieme_bleu py-3';

          ?>
          <?php if (!$isRestrictedRole): ?>

            <li>
              <a href="?controller=admin" class="flex <?= $adminClass ?> rounded-xl font-bold text-sm text-gris py-3 px-4">
                
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="16px" height="16px" class="text-lg mr-4"><g fill="#d0d2da" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M12,3c-2.20914,0 -4,1.79086 -4,4c0,2.20914 1.79086,4 4,4c2.20914,0 4,-1.79086 4,-4c0,-2.20914 -1.79086,-4 -4,-4zM12,14c-3.141,0 -9,1.545 -9,4.5v2.5h9.29492c-0.189,-0.634 -0.29492,-1.305 -0.29492,-2c0,-1.881 0.74512,-3.58675 1.95313,-4.84375c-0.708,-0.104 -1.37612,-0.15625 -1.95312,-0.15625zM18.06445,14c-0.129,0 -0.23695,0.09661 -0.25195,0.22461l-0.11719,1.01172c-0.484,0.168 -0.92078,0.42295 -1.30078,0.75195l-0.9375,-0.40625c-0.118,-0.051 -0.25436,-0.00458 -0.31836,0.10742l-0.9375,1.62109c-0.064,0.112 -0.03464,0.25408 0.06836,0.33008l0.80664,0.59766c-0.047,0.248 -0.07617,0.50172 -0.07617,0.76172c0,0.26 0.02817,0.51277 0.07617,0.75977l-0.80469,0.59961c-0.103,0.077 -0.13336,0.21908 -0.06836,0.33008l0.93555,1.62109c0.064,0.112 0.20231,0.15647 0.32031,0.10547l0.93555,-0.4043c0.379,0.328 0.81678,0.58395 1.30078,0.75195l0.11719,1.01172c0.014,0.129 0.12295,0.22461 0.25195,0.22461h1.87109c0.129,0 0.23695,-0.09661 0.25195,-0.22461l0.11719,-1.01172c0.484,-0.168 0.92078,-0.42295 1.30078,-0.75195l0.9375,0.40625c0.118,0.051 0.25436,0.00358 0.31836,-0.10742l0.9375,-1.62109c0.064,-0.112 0.03464,-0.25408 -0.06836,-0.33008l-0.80664,-0.59961c0.048,-0.247 0.07617,-0.49977 0.07617,-0.75977c0,-0.26 -0.02817,-0.51277 -0.07617,-0.75977l0.80469,-0.59961c0.103,-0.077 0.13336,-0.21908 0.06836,-0.33008l-0.93555,-1.62109c-0.064,-0.112 -0.20231,-0.15647 -0.32031,-0.10547l-0.93555,0.4043c-0.379,-0.328 -0.81678,-0.58395 -1.30078,-0.75195l-0.11719,-1.01172c-0.014,-0.129 -0.12295,-0.22461 -0.25195,-0.22461zM19,17.25c0.966,0 1.75,0.783 1.75,1.75c0,0.966 -0.784,1.75 -1.75,1.75c-0.966,0 -1.75,-0.784 -1.75,-1.75c0,-0.967 0.784,-1.75 1.75,-1.75z"></path></g></g></svg>Administration
              </a>
            </li>
            <?php endif; ?>

			<div class="border-b mb-14">

		</div>
			<li>
			<a href="?controller=settings" id="btnSettings" class="flex <?= ($currentController === "settings" ) ? 'bg-troisieme_bleu text-quatrieme_bleu py-4' : 'bg-second_bleu text-gris hover:bg-quatrieme_bleu py-3' ?> rounded-xl font-bold text-sm text-gris py-3 px-4">
	  			<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" class="text-lg mr-4" viewBox="0,0,256,256"
				style="fill:#000000;">
				<g fill="#d0d2da" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8,8)"><path d="M13.1875,3l-0.15625,0.8125l-0.59375,2.96875c-0.95312,0.375 -1.8125,0.90234 -2.59375,1.53125l-2.90625,-1l-0.78125,-0.25l-0.40625,0.71875l-2,3.4375l-0.40625,0.71875l0.59375,0.53125l2.25,1.96875c-0.08203,0.51172 -0.1875,1.02344 -0.1875,1.5625c0,0.53906 0.10547,1.05078 0.1875,1.5625l-2.25,1.96875l-0.59375,0.53125l0.40625,0.71875l2,3.4375l0.40625,0.71875l0.78125,-0.25l2.90625,-1c0.78125,0.62891 1.64063,1.15625 2.59375,1.53125l0.59375,2.96875l0.15625,0.8125h5.625l0.15625,-0.8125l0.59375,-2.96875c0.95313,-0.375 1.8125,-0.90234 2.59375,-1.53125l2.90625,1l0.78125,0.25l0.40625,-0.71875l2,-3.4375l0.40625,-0.71875l-0.59375,-0.53125l-2.25,-1.96875c0.08203,-0.51172 0.1875,-1.02344 0.1875,-1.5625c0,-0.53906 -0.10547,-1.05078 -0.1875,-1.5625l2.25,-1.96875l0.59375,-0.53125l-0.40625,-0.71875l-2,-3.4375l-0.40625,-0.71875l-0.78125,0.25l-2.90625,1c-0.78125,-0.62891 -1.64062,-1.15625 -2.59375,-1.53125l-0.59375,-2.96875l-0.15625,-0.8125zM14.8125,5h2.375l0.5,2.59375l0.125,0.59375l0.5625,0.1875c1.13672,0.35547 2.16797,0.95703 3.03125,1.75l0.4375,0.40625l0.5625,-0.1875l2.53125,-0.875l1.1875,2.03125l-2,1.78125l-0.46875,0.375l0.15625,0.59375c0.12891,0.57031 0.1875,1.15234 0.1875,1.75c0,0.59766 -0.05859,1.17969 -0.1875,1.75l-0.125,0.59375l0.4375,0.375l2,1.78125l-1.1875,2.03125l-2.53125,-0.875l-0.5625,-0.1875l-0.4375,0.40625c-0.86328,0.79297 -1.89453,1.39453 -3.03125,1.75l-0.5625,0.1875l-0.125,0.59375l-0.5,2.59375h-2.375l-0.5,-2.59375l-0.125,-0.59375l-0.5625,-0.1875c-1.13672,-0.35547 -2.16797,-0.95703 -3.03125,-1.75l-0.4375,-0.40625l-0.5625,0.1875l-2.53125,0.875l-1.1875,-2.03125l2,-1.78125l0.46875,-0.375l-0.15625,-0.59375c-0.12891,-0.57031 -0.1875,-1.15234 -0.1875,-1.75c0,-0.59766 0.05859,-1.17969 0.1875,-1.75l0.15625,-0.59375l-0.46875,-0.375l-2,-1.78125l1.1875,-2.03125l2.53125,0.875l0.5625,0.1875l0.4375,-0.40625c0.86328,-0.79297 1.89453,-1.39453 3.03125,-1.75l0.5625,-0.1875l0.125,-0.59375zM16,11c-2.75,0 -5,2.25 -5,5c0,2.75 2.25,5 5,5c2.75,0 5,-2.25 5,-5c0,-2.75 -2.25,-5 -5,-5zM16,13c1.66797,0 3,1.33203 3,3c0,1.66797 -1.33203,3 -3,3c-1.66797,0 -3,-1.33203 -3,-3c0,-1.66797 1.33203,-3 3,-3z"></path></g></g>
				</svg>Paramètres
              </a>
			</li>


		<li>
		<a href="?controller=logout"  class="flex hover:bg-quatrieme_bleu rounded-xl font-bold text-sm text-gris py-3 px-4">
                
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="16px" height="16px" class="text-lg mr-4"><g fill="#d0d2da" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="translate(234.66624,256) rotate(180) scale(10.66667,10.66667)"><path d="M10,1.25c-0.72951,-0.00053 -1.42929,0.28903 -1.94513,0.80487c-0.51584,0.51584 -0.8054,1.21562 -0.80487,1.94513v6.25h3.75c0.9665,0 1.75,0.7835 1.75,1.75c0,0.9665 -0.7835,1.75 -1.75,1.75h-3.75v6.25c-0.00053,0.72951 0.28903,1.42929 0.80487,1.94513c0.51584,0.51584 1.21562,0.8054 1.94513,0.80487h8c0.72951,0.00053 1.42929,-0.28903 1.94513,-0.80487c0.51584,-0.51584 0.8054,-1.21562 0.80487,-1.94513v-16c0.00053,-0.72951 -0.28903,-1.42929 -0.80487,-1.94513c-0.51584,-0.51584 -1.21562,-0.8054 -1.94513,-0.80487zM5.94336,7.26953c-0.17632,0.00933 -0.3437,0.08057 -0.47266,0.20117l-3.97656,3.97656l-0.02344,0.02344c-0.01003,0.00949 -0.0198,0.01926 -0.0293,0.0293c-0.00263,0.00323 -0.00524,0.00649 -0.00781,0.00977c-0.01369,0.01573 -0.02673,0.03202 -0.03906,0.04883c-0.0125,0.01771 -0.02423,0.03596 -0.03516,0.05469c-0.00263,0.00323 -0.00524,0.00649 -0.00781,0.00977c-0.00404,0.00774 -0.00795,0.01556 -0.01172,0.02344c-0.00915,0.01724 -0.01762,0.03483 -0.02539,0.05274c-0.00951,0.02172 -0.01798,0.04388 -0.02539,0.06641c-0.00204,0.00648 -0.00399,0.01299 -0.00586,0.01953c-0.00503,0.01483 -0.00958,0.02981 -0.01367,0.04492c-0.00068,0.0039 -0.00133,0.00781 -0.00195,0.01172c-0.00508,0.02388 -0.00899,0.048 -0.01172,0.07226c-0.00312,0.02398 -0.00507,0.0481 -0.00586,0.07227c-0.00005,0.00521 -0.00005,0.01042 0,0.01563c0.00043,0.02088 0.00173,0.04173 0.00391,0.0625c0.0022,0.02292 0.00546,0.04573 0.00977,0.06836c0.0012,0.00718 0.0025,0.01434 0.00391,0.02149c0.00382,0.01905 0.00838,0.03794 0.01367,0.05664c0.00613,0.02246 0.0133,0.04462 0.02148,0.06641c0.00377,0.00788 0.00768,0.01569 0.01172,0.02344c0.00549,0.01319 0.01135,0.02621 0.01758,0.03906c0.00193,0.00327 0.00388,0.00652 0.00586,0.00976c0.01024,0.01936 0.02131,0.03825 0.0332,0.05664c0.00506,0.00791 0.01027,0.01572 0.01563,0.02344c0.01051,0.01538 0.02158,0.03036 0.0332,0.04492c0.01601,0.01906 0.03296,0.03731 0.05078,0.05469c0.01497,0.01564 0.03061,0.03063 0.04688,0.04492l3.95313,3.95508c0.13985,0.14134 0.33046,0.22082 0.5293,0.2207c0.30271,-0.00083 0.57524,-0.18355 0.69096,-0.46326c0.11573,-0.27971 0.05196,-0.60157 -0.16167,-0.81603l-2.71875,-2.7207h7.18945c0.41421,0 0.75,-0.33579 0.75,-0.75c0,-0.41421 -0.33579,-0.75 -0.75,-0.75h-7.18945l2.71875,-2.7207c0.2077,-0.22341 0.25939,-0.55037 0.13075,-0.82696c-0.12865,-0.27659 -0.412,-0.44771 -0.71668,-0.43281z"></path></g></g></svg>Déconnexion
							  </a>
			</li>

          </ul>
        </div>
      
    </div>
  </aside>
</div>



 
