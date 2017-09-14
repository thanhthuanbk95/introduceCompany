$( document ).ready( function () {
    $( ".userForm" ).validate( {
        rules: {
            name: {
                required: true,
                minlength: 2,
                maxlength: 32,
            },
            email: {
                required: true,
                minlength: 7,
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
        },
        messages: {
            name: {
                required: "Vui lòng nhập thông tin",
                minlength: "Độ dài tối thiểu 2 ký tự",
                maxlength: "Độ dài tối đa 32 ký tự",
            },
            email: {
                required: "Vui lòng nhập thông tin",
                minlength: "Email không đúng",
                maxlength: "Email không đúng",
            },
            password:{
                required: "Vui lòng nhập thông tin",
                minlenght: "Mật khẩu tối thiểu chứa 6 ký tự",
                maxlenght:"Mật khẩu tối đa 32 ký tự"
            },
            fullname: {
                required: "Vui lòng nhập thông tin",
                minlength: "Độ dài tối thiểu 2 ký tự",
                maxlenght: "Độ dài tối đa 100 ký tự"
            }
        }
    });

    $( ".papersForm" ).validate( {

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
        },

        messages: {
        	title: {
        		required: "Vui lòng điền đầy đủ thông tin",
        		minlength: "Tiêu đều tối thiểu 10 ký tự",
        		maxlength: "Tiêu đề tối đa 100 ký tự"
        	},
        	describe: {
        		required: "Vui lòng điền đầy đủ thông tin",
        		minlength: "Mô tả quá ngắn"
        	}
        }
    });

    $( ".informationForm" ).validate( {

        rules: {
            name: {
                required: true
            },
            address: {
                required: true
            },
            phone: {
                required: true
            },
            email: {
                required: true
            },
            facebook: {
                required: true
            },
            google: {
                required: true
            },
            twitter: {
                required: true
            },
            pinterest: {
                required: true
            },
        },

        messages: {
        	name: {
                required: "Vui lòng điền thông tin này",
            },
            address: {
                required: "Vui lòng điền thông tin này",
            },
            phone: {
                required: "Vui lòng điền thông tin này",
            },
            email: {
                required: "Vui lòng điền thông tin này",
            },
            facebook: {
                required: "Vui lòng điền thông tin này",
            },
            google: {
                required: "Vui lòng điền thông tin này",
            },
            twitter: {
                required: "Vui lòng điền thông tin này",
            },
            pinterest: {
                required: "Vui lòng điền thông tin này",
            },
        }
    });

    $( "#introForm" ).validate( {
        rules: {
            detail: {
                required: true,
                minlength: 10
            }
        },
        messages: {
        	detail: {
        		required: "Vui lòng nhập thông tin",
        		minlength: "Vui longf nhập tối thiểu 10 ký tự"
        	}
        }
    });

    $( ".parentCatForm" ).validate( {
        rules: {
            name: {
                required: true,
            }
        },
        messages: {
        	name: {
        		required: "Vui lòng nhập thông tin",
        	}
        }
    });

    $( ".catForm" ).validate( {
        rules: {
            name: {
                required: true,
            }
        },
        messages: {
        	name: {
        		required: "Vui lòng nhập thông tin",
        	}
        }
    });

    $( ".phongthuyForm" ).validate( {
        rules: {
            title: {
                required: true,
                minlength: 10,
                maxlength: 100,
            },
            preview_text: {
                required: true,
                minlength: 10,
            },
            detail_text: {
                required: true,
                minlength: 10,
            }
        },

        messages: {
        	title: {
        		required: "Vui lòng điền đầy đủ thông tin",
        		minlength: "Tiêu đều tối thiểu 10 ký tự",
        		maxlength: "Tiêu đề tối đa 100 ký tự"
        	},
        	preview_text: {
        		required: "Vui lòng điền đầy đủ thông tin",
        		minlength: "Mô tả quá ngắn"
        	},
        	detail_text: {
        		required: "Vui lòng điền đầy đủ thông tin",
        		minlength: "Mô tả quá ngắn"
        	}
        }
    });

});