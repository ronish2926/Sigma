function expand(start,end){

    $("#expand").css('display','none');
    for($i = start ; $i<=end ; $i++ ){

        $("#li-"+$i).css('display', 'inline');

    }


}

function prevPage(initial,final,start,end){

    console.log("Initial = "+initial+" Final = "+final+" Start = "+start+" End = "+end);

    for(var i = initial ; i < final ; i++){


        if($("#pag-"+i).hasClass("active")){

            if(i > 0){

                if( (i-1) == end || (i-1) == start){
                    expand(start,end);
                }

                console.log("Activated current value");
                $("#pag-"+i).removeClass("active");
                $("#pag-"+(i-1)).addClass("active");
                $("#pag-"+(i-1)).trigger('click');
                break;

            }

        }

    }


}

function nextPage(initial,final,start,end){

    console.log("Initial = "+initial+" Final = "+final+" Start = "+start+" End = "+end);

    for(var i = initial ; i < final ; i++){


        if($("#pag-"+i).hasClass("active")){

            if(i < (final-1)){
                console.log((i+1) , start,end);
                var abc=i+1;

                if( abc == end || abc == start){
                    expand(start,end);

                }

                console.log("Activated current value");
                $("#pag-"+i).removeClass("active");
                $("#pag-"+(i+1)).addClass("active");
                $("#pag-"+(i+1)).trigger('click');
                break;

            }

        }

    }


}