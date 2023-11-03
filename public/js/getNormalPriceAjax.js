

    window.onload = function() {
    rider = document.getElementById("rider_id");

    rider.addEventListener("change",getNormalPrice);
}; 


    function getNormalPrice(){
      var id=rider.value;

    var token = $('meta[name="csrf-token"]').attr('content');

           var request= $.ajax({

            headers: {'X-CSRF-TOKEN': token},
              url: '/rider/'+id+'/getPrice/',
              type: 'get',

           });
           request.done(function(data){
            obj=JSON.parse(data);
            console.log(obj);
            fillValue(obj);
            


});

}


function fillValue(priceValue){


  var priceField=document.getElementById("price_of_lesson");

  priceField.value=priceValue;
  
}