// Répartition des migrants par region
var dataRegion = [{
    values: [migrantRegion[0].nombre_migrants, migrantRegion[1].nombre_migrants, migrantRegion[2].nombre_migrants],
    labels: ['NKC', 'NDB', 'Rosso'],
    type: 'pie'
  }];

  var layoutRegion = {
    height: 400,
    width: 500,
    title:"Répartition des migrants par region"
  };

  Plotly.newPlot('myDiv', dataRegion, layoutRegion);



// La repartition des migrant par nationnalité dans tous les regions
  var xArray = [];

  for (let index = 0; index < migrantNationalite.length; index++) {
        xArray.push(migrantNationalite[index].nationalite);
  }
  //console.log(xArray)

  var yArray = [];

  for (let index = 0; index < migrantNationalite.length ; index++) {
        yArray.push(migrantNationalite[index].total_migrants);
  }
  //console.log(yArray)
  const layoutCompetence = {title:"Repartition des migrants par nationnalité"};
  const dataCompetence = [{labels:xArray, values:yArray, hole:.4, type:"pie"}];

  Plotly.newPlot("myPlot", dataCompetence, layoutCompetence);





//  La repartition des migrant par nationnalité au niveau de NKTT

var nxArray = [];

for (let index = 0; index < migrantNationaliteNKTT.length; index++) {
      nxArray.push(migrantNationaliteNKTT[index].nationalite);
}
console.log(nxArray)

var nyArray = [];

for (let index = 0; index < migrantNationaliteNKTT.length ; index++) {
    nyArray.push(migrantNationaliteNKTT[index].total_migrants);
}
//console.log(yArray)
const layoutNationnalitNkt = {title:"Repartition des migrants par nationnalité"};
const dataNationnalitNkt = [{labels:nxArray, values:nyArray, hole:.4, type:"pie"}];

Plotly.newPlot("natNktt", dataNationnalitNkt, layoutNationnalitNkt);






// La repartition des migrant par competence au niveau de NKTT



var nxcArray = [];

for (let index = 0; index < migrantCompentenceNKTT.length; index++) {
      nxcArray.push(migrantCompentenceNKTT[index].competences_migrant);
}
console.log(nxcArray)

var nycArray = [];

for (let index = 0; index < migrantCompentenceNKTT.length ; index++) {
    nycArray.push(migrantCompentenceNKTT[index].nombre_migrants);
}

var dataCompentenceNKTT = [{
    type: "pie",
    values: nycArray,
    labels: nxcArray,
    textinfo: "label+percent",
    textposition: "outside",
    automargin: true
  }]

  var layoutCompentenceNKTT = {
    title:"Repartition des migrants par compétence"
    }

  Plotly.newPlot('compNktt', dataCompentenceNKTT, layoutCompentenceNKTT)
