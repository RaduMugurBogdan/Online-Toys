$(document).ready(function(){
    
    getComenzi();
    getVanzari();
    
    //tabel produse
    let rows = document.getElementsByClassName("produs");
    let rowsStart = 0;
    let rowsEnd = 9;
    let page = 1;
    
    let totalPages = Math.trunc(rows.length /9);
    let lastRows = rows.length%9;
    for(var i = rowsEnd;i<rows.length;i++)
    {
        rows[i].style.display = "none";
    }
    
    document.getElementById("page").innerHTML = "page " + page+"/"+(totalPages+1);
    
    let prevBtn = document.getElementById("prev");
    let nextBtn = document.getElementById("next");
    prevBtn.disabled = true;
    
    prevBtn.addEventListener("click",function(){
        page--;
        nextBtn.disabled = false;
        if(page!=1)
        {
            this.disabled = false;
        }
        else
        {
            this.disabled = true;
        }
        
        for(var i=rowsStart;i<rowsEnd;i++)
        {
            rows[i].style.display = "none";
        }
        
        rowsStart = rowsStart-9;
        if(page+1 == totalPages+1){
            rowsEnd = rowsEnd-lastRows;
        }
        else
        {
            rowsEnd = rowsEnd-9;
        }
        
        for(var i=rowsStart;i<rowsEnd;i++)
        {
            rows[i].style.display = "";
        }
        
        document.getElementById("page").innerHTML = "page " + page +"/"+(totalPages+1);

    });
    
    
    nextBtn.addEventListener("click",function(){
        page++;
        if(prevBtn.disabled == true)
        {
            prevBtn.disabled = false;
        }
        
        for(var i=rowsStart;i<rowsEnd;i++)
        {
            rows[i].style.display = "none";
        }
        
        rowsStart = rowsStart+9;
        
        if(page == totalPages+1){
            rowsEnd = rowsEnd+lastRows;
            this.disabled = true;
        }
        else
        {
            rowsEnd = rowsEnd+9;
        }
              
        document.getElementById("page").innerHTML = "page " + page +"/"+(totalPages+1);
        
        for(var i=rowsStart;i<rowsEnd;i++)
        {
            rows[i].style.display = "";
        }
    });
    

    
    

});

function getComenzi()
{
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

        xmlhttp=new XMLHttpRequest();

    } else {// code for IE6, IE5

        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

    }
    
    xmlhttp.onreadystatechange=function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            var comenzi = JSON.parse(xmlhttp.responseText);
            var data = [
                {
                    x: ['luni', 'marti', 'miercuri', 'joi', 'vineri', 'sambata', 'duminica'],
                    y: [comenzi[1].data, comenzi[2].data,comenzi[3].data, comenzi[4].data, comenzi[5].data, comenzi[6].data, comenzi[0].data],
                    type: 'bar'
                }
            ];
            var layout = {
                title: 'Comenzi',
                showlegend: false,
            };
            
            var config = {responsive: true};
            
            Plotly.newPlot('lng-comenzinoi', data, layout,config);

        }

    }

    xmlhttp.open("GET","http://localhost/TWProject/Controller/AdminController/homeController.php?action=get_weekly_comenzi", false);

    xmlhttp.send();
    

}

function graficVanzari(vanzariJSON)
{
    var data = vanzariJSON["data"];  
    var totaluri = new Array();
    for(var i=0;i<data.length;i++)
    {
        totaluri[data[i]["ziua"]]=data[i]["totalvanzari"];
    }
    console.log(totaluri);
    var data = [
        {
            x: ['luni', 'marti', 'miercuri', 'joi', 'vineri', 'sambata', 'duminica'],
            y: [totaluri[2], totaluri[3], totaluri[4], totaluri[5], totaluri[6], totaluri[7], totaluri[1] ],
            type: 'bar'
        }
    ];
    var layout = {
        title: 'Vanzari',
        showlegend: false,
    };
    
     var config = {responsive: true}

    Plotly.newPlot('lng-vanzari', data, layout, config);


//var trace1 = {
//  x: [1, 2, 3, 4],
//  y: [10, 15, 13, 17],
//  type: 'scatter'
//};
//
////var trace2 = {
////  x: [1, 2, 3, 4],
////  y: [16, 5, 11, 9],
////  type: 'scatter'
////};
//
//var data = [trace1];
//
//Plotly.newPlot('lng-vanzari', data);
}

function getVanzari()
{
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

        xmlhttp=new XMLHttpRequest();

    } else {// code for IE6, IE5

        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

    }

    xmlhttp.onreadystatechange=function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            var vanzari = JSON.parse(xmlhttp.responseText);
            graficVanzari(vanzari);

        }

    }

    xmlhttp.open("GET","http://localhost/TWProject/Controller/AdminController/homeController.php?action=get_vanzari", false);

    xmlhttp.send();
}