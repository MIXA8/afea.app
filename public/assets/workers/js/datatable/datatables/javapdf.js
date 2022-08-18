var tables = document.getElementById('export-button');
var headTable = tables.querySelectorAll("#head");
var bodyTable = tables.querySelectorAll("#fuck");
var bodyTableTr = bodyTable[0].querySelectorAll('tr');
var head_table_pdf = [];
var body_table_pdf = [];
var body_table_td = [];
for (let i = 0; i < headTable.length; i++) {
    head_table_pdf[i] = headTable[i].outerText;
}
for (let j = 0; j < bodyTableTr.length; j++) {
    body_table_td[j] = bodyTableTr[j].querySelectorAll('td');
    body_table_pdf[j] = [];
    for (let k = 0; k < body_table_td[0].length; k++) {
        if (k > 0 && k < 6) {
            var select = textPdfValue(body_table_td[j][k].querySelectorAll("#lesson")[0].value);
            body_table_pdf[j][k] = select;
        } else {
            body_table_pdf[j][k] = body_table_td[j][k].innerText;
        }
    }
}
// var array_pdf='1';
// for (let j = 0; j < body_table_pdf.length; j++) {
//         array_pdf[j]=new Array(body_table_pdf[0],body_table_pdf[1],body_table_pdf[2],body_table_pdf[3],body_table_pdf[4],body_table_pdf[5],body_table_pdf[6],body_table_pdf[7])
// }
console.log(body_table_pdf)

function textPdfValue(value) {
    switch (value) {
        case "0":
            return "+";
            break;
        case "1":
            return "УП";
            break;
        case "2":
            return "НБ";
            break;
        case "3":
            return "ОП";
            break;
        default:
            return "Ошибка";
    }
}

var dd = {
    content: [
        {
            style: 'tableExample',
            table: {
                body: [
                    ['body_table_pdf'],
                    body_table_pdf,

                ]
            }
        }]
}

pdfMake.createPdf(dd).download();

var c = [
    ['Column 1', 'Column 2', 'Column 3'],
    ['One value goes here', 'Another one here', 'OK?'],
    ['One value goes here', 'Another one here', 'OK?'],
    ['One value goes here', 'Another one here', 'OK?'],
    ['One value goes here', 'Another one here', 'OK?'],
];
// console.log(c)


// console.log(console.log(Object.values(body_table_pdf)))
// console.log(head_table_pdf)

// console.log(array);
