$(document).ready(function () {

// NE PAS VALIDER LE FORMULAIRE AVEC ENTER
    $(window).keydown(function(event){
        if(event.keyCode === 13) {
            event.preventDefault();
            return false;
        }
    });



    // BTN FORMULAIRE NEXT
    $('#submitted-form_1').on('click', function (e) {
        e.preventDefault();

        $('#form_1').css('display', 'none');
        $('#list-experience').css('display', 'block');
        $('.prog2').css('backgroundColor', '#6D678E');
    })
    $('#next-exp').on('click', function (e) {
        e.preventDefault();

        $('#list-experience').css('display', 'none');
        $('#list-formation').css('display', 'block');
        $('.prog3').css('backgroundColor', '#6D678E');
    })
    $('#next-dip').on('click', function (e) {
        e.preventDefault();

        $('#list-formation').css('display', 'none');
        $('#comp-langue').css('display', 'flex');
        $('.prog4').css('backgroundColor', '#6D678E');
    })
    $('#form_finish').on('click', function(e) {
        e.preventDefault();
        console.log('ok')
        $('.template-cv').css('display', 'none');
        $('.form-cv').css('display', 'none');
        $('#page-succes').css('display', 'flex');
        $('.prog5').css('backgroundColor', '#6D678E');

        $('#btn-continue').on('click', function (e) {
            e.preventDefault();

            // REDIRECTION
            document.location.href="../";
        })
    })

    // BTN FORMULAIRE PREV
    $('#prev-exp').on('click', function (e) {
        e.preventDefault();

        $('#list-experience').css('display', 'none');
        $('#form_1').css('display', 'block');
        $('.prog2').css('backgroundColor', '#F6B5CC');
    })
    $('#prev-dip').on('click', function (e) {
        e.preventDefault();

        $('#list-formation').css('display', 'none');
        $('#list-experience').css('display', 'block');
        $('.prog3').css('backgroundColor', '#F6B5CC');
    })
    $('#prev-cl').on('click', function (e) {
        e.preventDefault();

        $('#comp-langue').css('display', 'none');
        $('#list-formation').css('display', 'block');
        $('.prog4').css('backgroundColor', '#F6B5CC');
    })

// COMPETENCES ******************************************************************************
    $('#submitted-form_4-comp').on('click', function (e) {
        e.preventDefault();
        addComp();
    })
// LANGUES ******************************************************************************
    $('#submitted-form_4-langue').on('click', function (e) {
        e.preventDefault();
        addLangue();
    })

// EXPERIENCES ******************************************************************************


    $('#btn-exp').on('click', function (e) {
        e.preventDefault();

        $('#list-experience').css('display', 'none');
        $('#form_2').css('display', 'block');

        $('#submitted-form_2').on('click', function (e) {
            e.preventDefault();
            addExp();

            $('#form_2').css('display', 'none');
            $('#list-experience').css('display', 'block');

        })

    })

    // FORMATIONS ******************************************************************************


    $('#btn-dip').on('click', function (e) {
        e.preventDefault();

        $('#list-formation').css('display', 'none');
        $('#form_3').css('display', 'block');


        $('#submitted-form_3').on('click', function (e) {
            e.preventDefault();
            addDip();

            $('#list-formation').css('display', 'block');
            $('#form_3').css('display', 'none');
        })

    })

});
/* * * * * * * * * * * * * * * * * *
 * FONCTION SELECT
* * * * * * * * * * * * * * * * * */
function verifSelect(id)
{
    var select = document.getElementById(id)
    select.style.backgroundColor = '#ffffff';
    var value = select.value
    var myIframe = $('#myIframeCv').contents();
    if (value !== '') {
        if (value === 'red') {
            select.style.backgroundColor = '#fd4345'
            myIframe.find('.info').css('backgroundColor', '#fd4345')
            myIframe.find('.title-left').css('color', '#fd4345')
            myIframe.find('.ligne').css('backgroundColor', '#fd4345')
        }
        else if (value === 'blue') {
            select.style.backgroundColor = '#263547'
            myIframe.find('.info').css('backgroundColor', '#263547')
            myIframe.find('.title-left').css('color', '#263547')
            myIframe.find('.ligne').css('backgroundColor', '#263547')
        }
        else if (value === 'black') {
            select.style.backgroundColor = '#333333'
            myIframe.find('.info').css('backgroundColor', '#333333')
            myIframe.find('.title-left').css('color', '#333333')
            myIframe.find('.ligne').css('backgroundColor', '#333333')
        }
        else if (value === 'yellow') {
            select.style.backgroundColor = '#FFC300'
            myIframe.find('.info').css('backgroundColor', '#FFC300')
            myIframe.find('.title-left').css('color', '#FFC300')
            myIframe.find('.ligne').css('backgroundColor', '#FFC300')
        }
        else if (value === 'green') {
            select.style.backgroundColor = '#DAF7A6'
            myIframe.find('.info').css('backgroundColor', '#DAF7A6')
            myIframe.find('.title-left').css('color', '#DAF7A6')
            myIframe.find('.ligne').css('backgroundColor', '#DAF7A6')
        }
        else if (value === 'purple') {
            select.style.backgroundColor = '#7D3C98'
            myIframe.find('.info').css('backgroundColor', '#7D3C98')
            myIframe.find('.title-left').css('color', '#7D3C98')
            myIframe.find('.ligne').css('backgroundColor', '#7D3C98')
        }
    }
}
function verifSelect2(id)
{
    var select = document.getElementById(id)
    select.style.backgroundColor = '#fff'
    var value = select.value
    var myIframe = $('#myIframeCv').contents();
    if (value!== '') {
        if (value === 'red') {
            select.style.backgroundColor = '#fd4345'
            myIframe.find('.comp').css('backgroundColor', '#fd4345')
            myIframe.find('.title-middle').css('color', '#fd4345')
        }
        else if (value === 'blue') {
            select.style.backgroundColor = '#263547'
            myIframe.find('.comp').css('backgroundColor', '#263547')
            myIframe.find('.title-middle').css('color', '#263547')
        }
        else if (value === 'black') {
            select.style.backgroundColor = '#333333'
            myIframe.find('.comp').css('backgroundColor', '#333333')
            myIframe.find('.title-middle').css('color', '#333333')
        }
        else if (value === 'yellow') {
            select.style.backgroundColor = '#FFC300'
            myIframe.find('.comp').css('backgroundColor', '#FFC300')
            myIframe.find('.title-middle').css('color', '#FFC300')
        }
        else if (value === 'green') {
            select.style.backgroundColor = '#DAF7A6'
            myIframe.find('.comp').css('backgroundColor', '#DAF7A6')
            myIframe.find('.title-middle').css('color', '#DAF7A6')
        }
        else if (value === 'purple') {
            select.style.backgroundColor = '#7D3C98'
            myIframe.find('.comp').css('backgroundColor', '#7D3C98')
            myIframe.find('.title-middle').css('color', '#7D3C98')
        }
    }
}

/*****************************
 *  FONCTIONS AJOUT
 ******************************/
var idC = 1;
var idL = 1;
var idExp = 1;
var idDip = 1;

function addDip() {
    var dipInputRole = document.getElementById('diplome').value;
    var dipInputEnt = document.getElementById('etablissement').value;
    var dipInputVille = document.getElementById('ville-dip').value;
    var dipInputDesc = document.getElementById('desc-dip').value;
    var dipInputDate1 = document.getElementById('date-begin-dip').value;
    var dipInputDate2 = document.getElementById('date-end-dip').value;

    var myIframe = $('#myIframeCv').contents().find('#iframe-list-dip');


    if(dipInputRole !== '' && dipInputEnt !== '') {
        $('#list-dip').append('<li id="li-dip-' + idDip + '"><div class="container-list"><div class="list-preview"><span>' + dipInputRole + '</span><p>' + dipInputEnt + '</p></div><div class="list-button"><button><i class="fas fa-pen"></i></button><button onclick="deleteDip('+idDip+')"><i class="fas fa-trash"></i></button></div></div></li>');
        myIframe.append('<li id="li-dip-' + idDip + '"><div class="container-list-dip"><div class="left-list"><div class="date-list"><p id="cv-date-begin-dip-' + idDip + '">' + dipInputDate1 + '</p><p id="cv-date-end-dip-' + idDip + '">' + dipInputDate2 + '</p></div><div class="ville-list"><p id="cv-ville-dip-' + idDip + '">' + dipInputVille + '</p></div></div><div class="content-list"><div class="title-list"><p id="cv-diplome-' + idDip + '">' + dipInputRole + '</p><p id="cv-etablissement-' + idDip + '">' + dipInputEnt + '</p></div><div class="desc-list"><p id="cv-desc-dip-' + idDip + '">' + dipInputDesc + '</p></div></div></div></li>');

        $('#diplome').val('');
        $('#etablissement').val('');
        $('#ville-dip').val('');
        $('#desc-dip').val('');
        $('#date-begin-dip').val('');
        $('#date-end-dip').val('');
        idDip++;
    }
}

function addExp() {
    var expInputRole = document.getElementById('title-exp').value;
    var expInputEnt = document.getElementById('subtitle-exp').value;
    var expInputVille = document.getElementById('ville-exp').value;
    var expInputDesc = document.getElementById('desc-exp').value;
    var expInputDate1 = document.getElementById('date-begin-exp').value;
    var expInputDate2 = document.getElementById('date-end-exp').value;

    var myIframe = $('#myIframeCv').contents().find('#iframe-list-exp');


    if (expInputRole !== '' && expInputEnt !== '') {

        $('#list-exp').append('<li id="li-exp-' + idExp + '"><div class="container-list"><div class="list-preview"><span>' + expInputRole + '</span><p>' + expInputEnt + '</p></div><div class="list-button"><button><i class="fas fa-pen"></i></button><button onclick="deleteExp('+idExp+')"><i class="fas fa-trash"></i></button></div></div></li>');
        myIframe.append('<li id="li-exp-' + idExp + '"><div class="container-list-exp"><div class="left-list"><div class="date-list"><p id="cv-date-begin-dip-' + idExp + '">' + expInputDate1 + '</p><p id="cv-date-end-dip-' + idExp + '">' + expInputDate2 + '</p></div><div class="ville-list"><p id="cv-ville-dip-' + idExp + '">' + expInputVille + '</p></div></div><div class="content-list"><div class="title-list"><p id="cv-diplome-' + idExp + '">' + expInputRole + '</p><p id="cv-etablissement-' + idExp + '">' + expInputEnt + '</p></div><div class="desc-list"><p id="cv-desc-dip-' + idExp + '">' + expInputDesc + '</p></div></div></div></li>');


        // $('#form_2').append('<div id="content-exp-' + idExp + '"><div class="form-group-little"><div class="little-part"><label for="title-exp' + idExp +'">Poste/Titre</label><input type="text" id="title-exp' + idExp +'" name="title-exp' + idExp +'" placeholder="ex: D??veloppeur Web"></div><div class="little-part"><label for="subtitle-exp' + idExp +'">Entreprise</label><input type="text" id="subtitle-exp' + idExp +'" name="subtitle-exp' + idExp +'" placeholder="ex: Nom de l\'entreprise"></div></div><div class="form-group"><label for="ville-exp' + idExp +'">Lieu</label><input type="text" id="ville-exp' + idExp +'" name="ville-exp' + idExp +'" placeholder="ex: Paris"></div><div class="form-group-little"><div class="little-part"><label for="date-begin-exp' + idExp +'">D??but</label><input type="text" id="date-begin-exp' + idExp +'" name="date-begin-exp' + idExp +'" placeholder="ex: Jan - 2010"></div><div class="little-part"><label for="date-end-exp' + idExp +'">Fin</label><input type="text" id="date-end-exp' + idExp +'" name="date-end-exp' + idExp +'" placeholder="ex: F??v - 2011"></div></div><div class="form-group"><label for="desc-exp' + idExp +'">Description</label><textarea name="desc-exp' + idExp +'" id="desc-exp' + idExp +'" cols="30" rows="10"></textarea></div></div>')
        // $('#content-exp-' + (idExp - 1)).hide();

        $('#title-exp').val('');
        $('#subtitle-exp').val('');
        $('#ville-exp').val('');
        $('#desc-exp').val('');
        $('#date-begin-exp').val('');
        $('#date-end-exp').val('');

        idExp++;
    }
}

function addComp() {
    var input = document.getElementById('competence').value;

    var myIframe = $('#myIframeCv').contents().find('#iframe-list-comp');

    if (input !== '') {

        var item = $('#list-comp li p');
        var tab = [];
        for (var i = 0; i < item.length; i++) {
            tab.push($(item[i]).html());

        }
        if ($.inArray(input, tab) !== -1) {
            $('#competence').val('');
            alert('deja fait');

        } else {
            $('#list-comp').prepend('<li id="li-comp-' + idC + '" class="item-bubble"><p>' + input + '</p><button onclick="deleteComp('+idC+')"><i class="fas fa-times"></i></button></li>');
            myIframe.prepend('<li id="li-comp-' + idC + '" class="item-bubble"><p>' + input + '</p></li>')
            $('#competence').val('');
            idC++;

        }
    } else {
        //alert('ajoutez');
        // AJOUTER LA CLASS 'NON' au boutton ADD et faire l'animation keyframes test
    }
}

function addLangue() {
    var input = document.getElementById('langue').value;

    var myIframe = $('#myIframeCv').contents().find('#iframe-list-langue');

    if (input !== '') {

        var item = $('#list-langue li p');
        var tab = [];
        for (var i = 0; i < item.length; i++) {
            tab.push($(item[i]).html());
        }

        if ($.inArray(input, tab) !== -1) {
            $('#langue').val('');
            alert('deja fait');

        } else {
            $('#list-langue').prepend('<li id="li-langue-' + idL + '" class="item-bubble"><p>' + input + '</p><button onclick="deleteLangue('+idL+')"><i class="fas fa-times"></i></button></li>');
            myIframe.prepend('<li id="li-langue-' + idL + '" class="item-bubble"><p>' + input + '</p></li>');
            $('#langue').val('');
            idL++;

        }
    } else {
        //alert('ajoutez');
        // AJOUTER LA CLASS 'NON' au boutton ADD et faire l'animation keyframes test
    }
}


// FONCTION DELETE ===========================================
function deleteComp(num) {

    $( "#li-comp-" + num ).remove();
    $('#myIframeCv').contents().find('#li-comp-' + num).remove();

}

function deleteLangue(num) {

    $('#li-langue-' + num).remove();
    $('#myIframeCv').contents().find('#li-langue-' + num).remove();

}

function deleteExp(num) {
    console.log('exp')
    $('#li-exp-' + num).remove();
    $('#myIframeCv').contents().find('#li-exp-' + num).remove();
}

function deleteDip(num) {
    console.log('dip')
    $('#li-dip-' + num).remove();
    $('#myIframeCv').contents().find('#li-dip-' + num).remove();
}

/*****************************
 *  FONCTIONS CHANGEMENT DIRECT AVEC IFRAME
 ******************************/
function swicthTxt(data, datacv) {
    var input,
        element = document.getElementById(data);
    if (element != null) {
        input = element.value;
    } else {
        input = null;
    }
    document.getElementById(data).innerHTML = input;
    var myIframe = document.getElementById('myIframeCv');

    if (input === '') {
        myIframe.contentWindow.document.getElementById('cv-' + data).innerHTML = datacv;
    } else {
        myIframe.contentWindow.document.getElementById('cv-' + data).innerHTML = input;
    }

}

// Tableau Cv recruteur
$(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
  }).resize();
  

  
  // MENU BURGER
  var menuBtn = document.getElementById("menuBtn");
  var sideNav = document.getElementById("sideNav");
  var menu = document.getElementById("menu");
  sideNav.style.top = "-100%";
  menuBtn.onclick = function () {
    if (sideNav.style.top === "-100%") {
      sideNav.style.top = "0";
    //   menu.src = "../../wp-content/themes/cvtech/asset/img/close.png";
    $('#open').css('display', 'none');
    $('#close').css('display', 'inline');
    } else {
      sideNav.style.top = "-100%";
    //   menu.src = "../../wp-content/themes/cvtech/asset/img/menu.png";
    $('#open').css('display', 'inline');
    $('#close').css('display', 'none');
    }
  };
  
  // SMOOTH BURGER
  var scroll = new SmoothScroll('a[href*="#"]', {
    speed: 1500,
    speedAsDuration: true,
  });