// Créer la carte et définir la vue
const map = L.map('map');
map.setView([regions[0].longitude, regions[0].latitude], 7);

// Ajouter la couche de tuiles OpenStreetMap à la carte
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
  foo: 'bar',
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);




// Données pour les centres d'accueil
const data = {
  NKC: {
    coords: [regions[0].longitude, regions[0].latitude],
    title: "CRM",
    address: `
      <b>${psh[1].nom}</b><br>
      emplacement: ${psh[1].emplacement}<br>
      capacité: ${psh[1].capacite}<br>
      service disponible: ${psh[1].service_dispo}
    `
  },
  NDB: {
    coords: [regions[1].longitude, regions[1].latitude],
    title: "CRM",
    address: `
      <b>${psh[2].nom}</b><br>
      emplacement: ${psh[2].emplacement}<br>
      capacité: ${psh[2].capacite}<br>
      service disponible: ${psh[2].service_dispo}
    `
  },
  Rosso: {
    coords: [regions[2].longitude, regions[2].latitude],
    title: "PSH",
    address: `
      <b>${psh[0].nom}</b><br>
      emplacement: ${psh[0].emplacement}<br>
      capacité: ${psh[0].capacite}<br>
      service disponible: ${psh[0].service_dispo}
    `
  }
};





//Compétences icônes
var competenceIcons = {
  peche: L.icon({
    iconUrl: 'img/peche.jpg',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34]
  }),
  mecanique: L.icon({
    iconUrl: 'img/mecanique.jpg',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34]
  }),
  masonnerie: L.icon({
    iconUrl: 'img/masonnerie.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34]
  }),
  agriculture: L.icon({
    iconUrl: 'img/agriculture.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34]
  }),
  // Ajoutez d'autres compétences et icônes ici
};




// Icône personnalisée pour les centres d'accueil
var customIcon = L.icon({
  iconUrl: 'img/crm.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34]
});




// Icône personnalisée pour les sexes des migrants
var sexeIcon = L.icon({
    iconUrl: 'img/sexe.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34]
  });






var markers = {}; // Stocker les marqueurs des centres d'accueil

// Ajouter tous les marqueurs des centres d'accueil sur la carte
for (let key in data) {
  const marq = data[key];

  var marker = L.marker(marq.coords, {
    title: marq.title,
    icon: customIcon,
  })
    .bindPopup(`
      <span class="popup">
        ${marq.address}<br>
      </span>
    `);

  markers[key] = marker; // Stocker les marqueurs dans un objet
}

// Fonction pour afficher les marqueurs des centres d'accueil sur la carte
function showMarkers() {
  // Supprimer les marqueurs existants
  for (let key in markers) {
    map.removeLayer(markers[key]);
  }

  // Vérifier si la case "Centres d'accueil" est cochée
  var checkboxPoste = document.getElementById('checkbox-poste').checked;

  if (checkboxPoste) {
    // Ajouter les marqueurs correspondants
    for (let key in markers) {
      map.addLayer(markers[key]);
    }
  }
}

// Écouter le clic sur le bouton pour afficher les marqueurs des centres d'accueil
document.getElementById('btn').addEventListener('click', showMarkers);




var competenceMarkers = {};
var markerClusterGroup = L.markerClusterGroup(); // Création du groupe de clusters

function showCompetenceMarkers() {
  // Supprimer les marqueurs de compétences existants
  markerClusterGroup.clearLayers();
  competenceMarkers = {}; // Réinitialiser l'objet competenceMarkers

  // Vérifier si la case "Compétence" est cochée
  var checkboxCompetence = document.getElementById('checkbox-competence').checked;

  if (checkboxCompetence) {
    // Parcourir les données de compétences des migrants
    for (let i = 0; i < competence.length; i++) {
      let competenceData = competence[i];
      let competenceName = competenceData.competence;
      let region = competenceData.region;
      let count = competenceData.nombre_migrants;

      // Vérifier si la compétence existe dans les icônes de compétences
      if (competenceIcons.hasOwnProperty(competenceName)) {
        let regionCoords;

        // Trouver les coordonnées de la région correspondante en fonction de la compétence
        switch (region) {
          case 'Nouakchott':
            if (competenceName === 'masonnerie') {
              regionCoords = [regions[0].longitude, regions[0].latitude];
            } else if (competenceName === 'mecanique') {
              regionCoords = [regions[3].longitude, regions[3].latitude];
            }
            break;
          case 'Nouadhibou':
            if (competenceName === 'mecanique') {
              regionCoords = [regions[1].longitude, regions[1].latitude];
            } else if (competenceName === 'peche') {
              regionCoords = [regions[4].longitude, regions[4].latitude];
            }
            break;
          case 'Rosso':
            if (competenceName === 'agriculture') {
              regionCoords = [regions[2].longitude, regions[2].latitude];
            } else if (competenceName === 'peche') {
              regionCoords = [regions[5].longitude, regions[5].latitude];
            }
            break;
        }

        // Créer un marqueur avec les coordonnées de la région correspondante et l'icône de compétence
        if (regionCoords) {
          let marker = L.marker(regionCoords, {
            title: 'Compétences',
            icon: competenceIcons[competenceName],
          }).bindPopup(
            `Compétence: ${competenceName}<br>Région: ${region}<br>Nombre de migrants: ${count}`
          );

          if (!competenceMarkers[competenceName]) {
            competenceMarkers[competenceName] = {
              competenceName: competenceName,
              markers: [],
            };
          }

          competenceMarkers[competenceName].markers.push(marker);
          markerClusterGroup.addLayer(marker);
        }
      }
    }
  }

  map.addLayer(markerClusterGroup); // Ajout du groupe de clusters à la carte
}

// Écouter le changement d'état de la case à cocher "Compétence"
document.getElementById('checkbox-competence').addEventListener('change', showCompetenceMarkers);








  var sexeMarkers = {};

  function showSexeMarkers() {
    // Supprimer les marqueurs de sexe existants
    for (let regionId in sexeMarkers) {
      let markers = sexeMarkers[regionId].markers;
      for (let i = 0; i < markers.length; i++) {
        map.removeLayer(markers[i]);
      }
    }
    sexeMarkers = {}; // Réinitialiser l'objet sexeMarkers

    // Vérifier si la case "Sexe" est cochée
    var checkboxSexe = document.getElementById('checkbox-sexe').checked;

    if (checkboxSexe) {
      // Parcourir les données de sexe des migrants
      for (let i = 0; i < sexe.length; i++) {
        let sexeData = sexe[i];
        let regionId = sexeData.region_id;
        let sexeType = sexeData.sexe;
        let count = sexeData.nombre_migrants;

        let regionCoords;

        if (regionId === 1) {
          regionCoords = [regions[0].longitude, regions[0].latitude];
        } else if (regionId === 2) {
          regionCoords = [regions[1].longitude, regions[1].latitude];
        } else if (regionId === 3) {
          regionCoords = [regions[2].longitude, regions[2].latitude];
        }

        // Créer un marqueur avec les coordonnées de la région correspondante et l'icône de sexe
        let marker = L.marker(regionCoords, {
          title: "Sexe",
          icon: sexeIcon,
        }).bindPopup(`Sexe: ${sexeType}<br>Région: ${regionId}<br>Nombre de migrants: ${count}`);

        if (!sexeMarkers[regionId]) {
          sexeMarkers[regionId] = {
            regionCoords: regionCoords,
            total: 0,
            femmes: 0,
            hommes: 0,
            markers: []
          };
        }

        // Ajouter le nombre de migrants au total de la région correspondante
        sexeMarkers[regionId].total += count;

        // Ajouter le nombre de migrants en fonction du sexe
        if (sexeType === 'femme') {
          sexeMarkers[regionId].femmes += count;
        } else if (sexeType === 'homme') {
          sexeMarkers[regionId].hommes += count;
        }

        sexeMarkers[regionId].markers.push(marker); // Stocker les marqueurs de sexe dans un tableau
      }

      // Afficher les marqueurs de sexe pour chaque région
      for (let regionId in sexeMarkers) {
        let regionData = sexeMarkers[regionId];
        let regionCoords = regionData.regionCoords;
        let femmes = regionData.femmes;
        let hommes = regionData.hommes;
        let total = regionData.total;

        // Créer un marqueur avec les coordonnées de la région correspondante et l'icône de sexe
        let marker = L.marker(regionCoords, {
          title: "Sexe",
          icon: sexeIcon,
        }).bindPopup(`Région: ${regionId}<br>Femmes migrantes: ${femmes}<br>Hommes migrants: ${hommes}<br>Total des migrants: ${total}`);

        regionData.markers.push(marker); // Ajouter le marqueur à la liste des marqueurs de la région
      }

      // Ajouter tous les marqueurs à la carte
      for (let regionId in sexeMarkers) {
        let regionData = sexeMarkers[regionId];
        let markers = regionData.markers;

        for (let i = 0; i < markers.length; i++) {
          markers[i].addTo(map);
        }
      }
    }
  }

  // Écouter le changement d'état de la case à cocher "Sexe"
  document.getElementById('checkbox-sexe').addEventListener('change', showSexeMarkers);







// var competenceMarkers = {};

// function showCompetenceMarkers() {
// // Supprimer les marqueurs de compétences existants
// for (let competence in competenceMarkers) {
//     let markers = competenceMarkers[competence].markers;
//     for (let i = 0; i < markers.length; i++) {
//     map.removeLayer(markers[i]);
//     }
// }
// competenceMarkers = {}; // Réinitialiser l'objet competenceMarkers

// // Vérifier si la case "Compétence" est cochée
// var checkboxCompetence = document.getElementById('checkbox-competence').checked;

// if (checkboxCompetence) {
//     // Parcourir les données de compétences des migrants
//     for (let i = 0; i < competence.length; i++) {
//     let competenceData = competence[i];
//     let competenceName = competenceData.competence;
//     let region = competenceData.region;
//     let count = competenceData.nombre_migrants;

//     // Vérifier si la compétence existe dans les icônes de compétences
//     if (competenceIcons.hasOwnProperty(competenceName)) {
//         let regionCoords;

//         // Trouver les coordonnées de la région correspondante en fonction de la compétence
//         switch (region) {
//         case 'Nouakchott':
//             if (competenceName === 'masonnerie') {
//             regionCoords = [regions[0].longitude, regions[0].latitude];
//             } else if (competenceName === 'mecanique') {
//             regionCoords = [regions[3].longitude, regions[3].latitude];
//             }
//             break;
//         case 'Nouadhibou':
//             if (competenceName === 'mecanique') {
//             regionCoords = [regions[1].longitude, regions[1].latitude];
//             } else if (competenceName === 'mecanique') {
//             regionCoords = [regions[4].longitude, regions[4].latitude];
//             }
//             break;
//         case 'Rosso':
//             if (competenceName === 'agriculture') {
//             regionCoords = [regions[2].longitude, regions[2].latitude];
//             } else if (competenceName === 'peche') {
//             regionCoords = [regions[5].longitude, regions[5].latitude];
//             }
//             break;
//         }

//         // Créer un marqueur avec les coordonnées de la région correspondante et l'icône de compétence
//         if (regionCoords) {
//         let marker = L.marker(regionCoords, {
//             title: 'Compétences',
//             icon: competenceIcons[competenceName],
//         }).bindPopup(
//             `Compétence: ${competenceName}<br>Région: ${region}<br>Nombre de migrants: ${count}`
//         );

//         if (!competenceMarkers[competenceName]) {
//             competenceMarkers[competenceName] = {
//             competenceName: competenceName,
//             markers: [],
//             };
//         }

//         competenceMarkers[competenceName].markers.push(marker);
//         marker.addTo(map);
//         }
//     }
//     }
// }
// }

// // Écouter le changement d'état de la case à cocher "Compétence"
// document.getElementById('checkbox-competence').addEventListener('change', showCompetenceMarkers);

