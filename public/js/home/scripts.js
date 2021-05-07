function RestablecerTodo() {

    document.getElementById("btnCreditos").style.backgroundColor = '#337BA3';
    document.getElementById("btnCreditos").style.color = 'white';

    document.getElementById("btnOperaciones").style.backgroundColor = '#70639E';
    document.getElementById("btnOperaciones").style.color = 'white';

    document.getElementById("btnGth").style.backgroundColor = '#D6975F';
    document.getElementById("btnGth").style.color = 'white';
    document.getElementById("submenuGth").classList.remove("show");

    document.getElementById("btnLogistica").style.backgroundColor = '#71BC9C';
    document.getElementById("btnLogistica").style.color = 'white';
    document.getElementById("submenuLogistica").classList.remove("show");

    document.getElementById("btnContabilidad").style.backgroundColor = '#D64355';
    document.getElementById("btnContabilidad").style.color = 'white';
    document.getElementById("submenuContabilidad").classList.remove("show");

}


$(document).scroll(function () {
    RestablecerTodo();
});

$(document).click(function () {
    RestablecerTodo();
});

function mostrarSubItem(buttonName, submenuName) {

    if (screen.height <= 500) {

        if (buttonName == 'btnCreditos') {

            document.getElementById(submenuName).style.marginTop = '0px'

        } else if (buttonName == 'btnOperaciones') {

            document.getElementById(submenuName).style.marginTop = '0px';

        } else if (buttonName == 'btnGth') {

            document.getElementById(submenuName).style.marginTop = '0px';

        } else if (buttonName == 'btnLogistica') {

            document.getElementById(submenuName).style.marginTop = '0px';

        } else if (buttonName == 'btnContabilidad') {

            document.getElementById(submenuName).style.marginTop = '0px';

        };

    } else if (screen.width < 900) {

        if (buttonName == 'btnCreditos') {

            document.getElementById(buttonName).style.background = 'transparent';
            document.getElementById(buttonName).style.color = 'transparent';
            document.getElementById(submenuName).style.marginTop = '-190px'

            document.getElementById("btnOperaciones").style.backgroundColor = '#70639E';
            document.getElementById("btnOperaciones").style.color = 'white';

            document.getElementById("btnGth").style.backgroundColor = '#D6975F';
            document.getElementById("btnGth").style.color = 'white';

            document.getElementById("btnLogistica").style.backgroundColor = '#71BC9C';
            document.getElementById("btnLogistica").style.color = 'white';

            document.getElementById("btnContabilidad").style.backgroundColor = '#D64355';
            document.getElementById("btnContabilidad").style.color = 'white';

        } else if (buttonName == 'btnOperaciones') {
            document.getElementById(buttonName).style.background = 'transparent';
            document.getElementById(buttonName).style.color = 'transparent';
            document.getElementById(submenuName).style.marginTop = '-190px';

            document.getElementById("btnCreditos").style.backgroundColor = '#337BA3';
            document.getElementById("btnCreditos").style.color = 'white';

            document.getElementById("btnGth").style.backgroundColor = '#D6975F';
            document.getElementById("btnGth").style.color = 'white';

            document.getElementById("btnLogistica").style.backgroundColor = '#71BC9C';
            document.getElementById("btnLogistica").style.color = 'white';

            document.getElementById("btnContabilidad").style.backgroundColor = '#D64355';
            document.getElementById("btnContabilidad").style.color = 'white';

        } else if (buttonName == 'btnGth') {
            document.getElementById(buttonName).style.background = 'transparent';
            document.getElementById(buttonName).style.color = 'transparent';
            document.getElementById(submenuName).style.marginTop = '-190px';

            document.getElementById("btnCreditos").style.backgroundColor = '#337BA3';
            document.getElementById("btnCreditos").style.color = 'white';

            document.getElementById("btnOperaciones").style.backgroundColor = '#70639E';
            document.getElementById("btnOperaciones").style.color = 'white';

            document.getElementById("btnLogistica").style.backgroundColor = '#71BC9C';
            document.getElementById("btnLogistica").style.color = 'white';

            document.getElementById("btnContabilidad").style.backgroundColor = '#D64355';
            document.getElementById("btnContabilidad").style.color = 'white';

        } else if (buttonName == 'btnLogistica') {
            document.getElementById(buttonName).style.background = 'transparent';
            document.getElementById(buttonName).style.color = 'transparent';
            document.getElementById(submenuName).style.marginTop = '-190px';

            document.getElementById("btnCreditos").style.backgroundColor = '#337BA3';
            document.getElementById("btnCreditos").style.color = 'white';

            document.getElementById("btnOperaciones").style.backgroundColor = '#70639E';
            document.getElementById("btnOperaciones").style.color = 'white';

            document.getElementById("btnGth").style.backgroundColor = '#D6975F';
            document.getElementById("btnGth").style.color = 'white';

            document.getElementById("btnContabilidad").style.backgroundColor = '#D64355';
            document.getElementById("btnContabilidad").style.color = 'white';

        } else if (buttonName == 'btnContabilidad') {
            document.getElementById(buttonName).style.background = 'transparent';
            document.getElementById(buttonName).style.color = 'transparent';
            document.getElementById(submenuName).style.marginTop = '870px';

            document.getElementById("btnCreditos").style.backgroundColor = '#337BA3';
            document.getElementById("btnCreditos").style.color = 'white';

            document.getElementById("btnOperaciones").style.backgroundColor = '#70639E';
            document.getElementById("btnOperaciones").style.color = 'white';

            document.getElementById("btnGth").style.backgroundColor = '#D6975F';
            document.getElementById("btnGth").style.color = 'white';

            document.getElementById("btnLogistica").style.backgroundColor = '#71BC9C';
            document.getElementById("btnLogistica").style.color = 'white';
        };

    };
};

