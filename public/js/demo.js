
(function ($) {



    var TIMEOUT = 2000;
    var NUM_ORDER = 0;

    var VALUES = '["","","","","","50","40","30","25","20","15","12.50","10","8.50","8","7.50","7","6.50","6","5.50","5","3","2.5","2","1.5","1","1","1","1","0.50","0.50","0.50","0.50","0.50"]';




    
    appendNumber = function(num)
    {
        //
        console.log(num);


        var val = jQuery.parseJSON(VALUES);

        if (NUM_ORDER < 5) {
            var new_number = '<li class="dark"><span class="num">' + num +'</span><span class="value">'+ val[NUM_ORDER] +'</span></li>';
        } else {
            var new_number = '<li><span class="num">' + num +'</span><span class="value">'+ val[NUM_ORDER] +' KM</span></li>';
        }


        $(new_number).hide().appendTo("ul.drawn-list").fadeIn(1000);



    };

    
    drawNumber = function (num) {


            $('#current-number').fadeOut(function(){

                $('#current-number').html(num).fadeIn();

                appendNumber(num);
                NUM_ORDER++;

            });


    };


    $(document)
        .ready(function () {



            alert('Jel bre more da pođe???');

            var obj = jQuery.parseJSON(EVENT_NUMBERS);
            var counter = 0;
            var max = obj.length;

            console.log(obj);



            var stop = setInterval(function() {


                if (counter == (max - 1)) {
                    clearInterval(stop);
                }


                drawNumber(obj[counter]);
                counter++;


            }, TIMEOUT);







            /*
            for ( var i = 0, l = obj.length; i < l; i++ ) {


                appendNumber(obj[i]);



            }

            */




        });
})(window.jQuery);