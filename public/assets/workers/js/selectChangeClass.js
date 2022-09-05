// author: Java
// date: 22.08.2022


const Allselect = document.getElementsByTagName('select');
boxes.forEach(select => {
    select.className = selectClass(select);
});

boxes.forEach(select => {

    select.addEventListener('change', function () {
        select.className = selectClass(this);
    });
});

function selectClass(select) {
    switch (select.selectedIndex) {
        case 1:
            // console.log(1)
            return "valueDangerNB"
        case 2:
            // console.log(2)
            return "valueSuccessNB"
        case 3:
            // console.log(3)
            return "valueLate"
        case 0:
            return "valueZero"
        default:
            return "valueZero"
    }
}
