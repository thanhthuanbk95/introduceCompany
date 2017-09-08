$( document ).ready( function () {
	$( "#room" ).validate( {
		
		rules: {
			name: {
				required: true,
				minlength: 5,
				maxlength: 100,
			},
		}
	});
	$( "#emotion" ).validate( {
		
		rules: {
			name: {
				required: true,
				minlength: 5,
				maxlength: 100,
			},
			code: {
				required: true,
				minlength: 2,
				maxlength: 100,
			},
		}
	});
    $( "#user" ).validate( {

        rules: {
            name: {
                required: true,
                minlength: 2,
                maxlength: 32,
            },
            email: {
                required: true,
                minlength: 10,
                maxlength: 200,
            },
			password:{
            	required: true,
				minlenght: 6,
				maxlenght:32
			},
			fullname: {
            	required: true,
				minlength: 2,
				maxlenght: 100
			}
        }
    });
    $( "#papers" ).validate( {

        rules: {
            title: {
                required: true,
                minlength: 10,
                maxlength: 100,
            },
            describe: {
                required: true,
                minlength: 10,
            }
        }
    });
});