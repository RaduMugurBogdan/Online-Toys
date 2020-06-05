$(document).ready(function (){
   //tabel produse
   paging("lng-comenzi","page","prev","next",14);
    
});
    
function paging(idRows,idPageNr,idPrevBtn,idNextBtn,nrRows)
{
    let rows = document.getElementsByClassName(idRows);
    console.log(rows.length);
    let rowsStart = 0;
    let rowsEnd = nrRows;
    let page = 1;
    let totalPages;
    let lastRows;
    console.log(rows.length);
    totalPages = Math.trunc(rows.length /nrRows);
    lastRows = rows.length%nrRows;
    console.log(totalPages);
   
        
    for(var i = rowsEnd;i<rows.length;i++)
    {
        rows[i].style.display = "none";
    }
    
    document.getElementById(idPageNr).innerHTML = "page " + page+"/"+(totalPages+1);
    
    let prevBtn = document.getElementById(idPrevBtn);
    let nextBtn = document.getElementById(idNextBtn);
    prevBtn.disabled = true;
    
    if(totalPages == 0){
        nextBtn.disabled = true;
    }
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
        
        rowsStart = rowsStart-nrRows;
        if(page+1 == totalPages+1){
            rowsEnd = rowsEnd-lastRows;
        }
        else
        {
            rowsEnd = rowsEnd-nrRows;
        }
        
        for(var i=rowsStart;i<rowsEnd;i++)
        {
            rows[i].style.display = "";
        }
        
        document.getElementById(idPageNr).innerHTML = "page " + page +"/"+(totalPages+1);

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
        
        rowsStart = rowsStart+nrRows;
        
        if(page == totalPages+1){
            rowsEnd = rowsEnd+lastRows;
            this.disabled = true;
        }
        else
        {
            rowsEnd = rowsEnd+nrRows;
        }
              
        document.getElementById(idPageNr).innerHTML = "page " + page +"/"+(totalPages+1);
        
        for(var i=rowsStart;i<rowsEnd;i++)
        {
            rows[i].style.display = "";
        }
    });
}
function showOrder(produse,user)
{
    
    let modal = document.getElementById('modal');
    modal.style.display = "block";
    let close = document.getElementById('modal-close');
    console.log(close);
    close.addEventListener("click",function(){
       modal.style.display = "none"; 
    });
    window.onclick = function(event){
        if(event.target == modal){
            modal.style.display = "none";
        }
    }
    
    let templateTabelProduse = `<tr>
                        <th>Produs</th>
                        <th>Cantitate</th>
                        <th>Producator</th>
                        <th>Pret</th>
                    </tr>`;
    
    for(var i=0;i<produse.length;i++)
    {
        let row = `<tr class="prod">
                        <td>${produse[i]["Denumire"]}</td>
                        <td>${produse[i]["CantitateComandata"]}</td>
                        <td>${produse[i]["Producator"]}</td>
                        <td>${produse[i]["PretTotal"]}</td>`;
        
        templateTabelProduse = templateTabelProduse + row;
                    
    }
    
    let template = `<div id="lng-user-data">
                    <label class="lng-label" id="username">Username:</label>
                    <label class="lng-label" id="usernameData">${user["Username"]}</label>
                    <label class="lng-label" id="adresa">Adresa:</label>
                    <label class="lng-label" id="adresaData">${user["Email"]}</label>
                    <label class="lng-label" id="email">Email:</label>
                    <label class="lng-label" id="emailData">${user["Email"]}</label>
                    <label class="lng-label" id="tel">Tel:</label>
                    <label class="lng-label" id="telData">${user["Phone"]}</label>
                    </div>
                    <div id="lng-container">
                    <table id="lng-tabel-produse">
                        ${templateTabelProduse}
                    </table>
                    <div id="lng-paginare">
                        <button id="prevProd" class="lng-btn"><</button>
                        <span id="pageProd"></span>
                        <button id="nextProd" class="lng-btn">></button>
                        </div>
                    </div>`
                    
    
    document.getElementById("modal-content").innerHTML = template;
    paging("prod","pageProd","prevProd","nextProd",4);
                    
                    
}


