/* let DETAILS = [
    {name: "IM0123", time: "01.01.1980 00:00", bubu: "15"},
    {name: "IM0234", time: "05.05.1980 00:00", bubu: "45"},
    {name: "IM0345", time: "09.09.1980 00:00", bubu: "105"},
  ];



  fillTable('export-button');

  function fillTable(id){
    let trs = document.querySelectorAll('#' + id + ' tbody tr');

    Array.from(trs).forEach(function(tr, index){
      let td = tr.querySelectorAll('td');

      let d = DETAILS[index];
      td[0].textContent = d.name;
      td[1].textContent = d.time;
      td[2].textContent = d.bubu;
    });
  } */

// let td = document.getElementById('#lesson')
// td.textContent = 'Fick';
