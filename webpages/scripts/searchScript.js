function searchFood() 
{
    var searchValue = document.getElementById('searchInput').value;
    var typeFilter = document.getElementById('typeFilter').value;
    var priceOrder = document.getElementById('priceOrder').value;

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() 
    {
        if (xhr.readyState === XMLHttpRequest.DONE) 
        {
            if (xhr.status === 200) 
            {
                var response = xhr.responseText;
                document.getElementById('resultsContainer').innerHTML = response;
            }
            else 
            {
                console.error('Error: ' + xhr.status);
            }
        }
    };

    var url = 'classes/searchFood.php?name=' + searchValue + '&typeFilter=' + typeFilter + '&price=' + priceOrder;
    xhr.open('GET', url, true);
    xhr.send();
    
}

window.onload = function() 
{
    searchFood();
};