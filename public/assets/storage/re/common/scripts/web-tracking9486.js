function measureProductImpressions(impressions){}
function measuringProductClicks(productObject){}
function measureAddProductToShoppingCartGA4(productObject,quantity){window.dataLayer.push({ecommerce:null});var total_raw=Math.abs(productObject.price*quantity);dataLayer.push({'event':'add_to_cart','ecommerce':{'currency':'USD','value':total_raw.toFixed(2),'items':[{'item_name':productObject.name,'item_id':productObject.id,'price':productObject.price,'item_category':productObject.category,'quantity':quantity}]}});}
function measureLoginGA4(){dataLayer.push({'event':'gs.login',});}
function measureLogoutGA4(){window.dataLayer.push({event:"gs.logout",});}
function measureAddProductToShoppingCart(productObject,quantity){}
function measureRemoveProductFromShoppingCart(productObject,quantity){window.dataLayer.push({ecommerce:null});var total_raw=Math.abs(productObject.price*quantity);dataLayer.push({'event':'remove_from_cart','ecommerce':{'currency':'USD','value':total_raw.toFixed(2),'items':[{'item_name':productObject.item_name,'item_id':productObject.item_id,'price':productObject.price,'item_category':productObject.item_category,'quantity':quantity}]}});}
function measureCheckoutSteps(step,products){}
function measurePurchases(purchase,products){}