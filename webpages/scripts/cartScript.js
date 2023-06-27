function addToCart(itemId) 
{
    var cartItems = sessionStorage.getItem('cart');
    if (cartItems) {
      cartItems = JSON.parse(cartItems);
    } else {
      cartItems = [];
    }
    //hi
    cartItems.push(itemId);
  
    sessionStorage.setItem('cart', JSON.stringify(cartItems));
  
    alert('Item added to cart!');
}

