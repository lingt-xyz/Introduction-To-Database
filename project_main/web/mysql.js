$(document).ready(function() {
	$('input[name=mysql_choice]').on("click",function(){
		var val = $('input[name=mysql_choice]:checked').val();
		if(val=="DDL"){				// create tables and/or modify the schemas
			$( "#mysql_dml_group" ).hide();
			$( "#mysql_ddl_group" ).show();
			$('input[name=mysql_ddl][value="create"]').prop("checked",true).trigger("click");
		}else{					// queries
			$( "#mysql_ddl_group" ).hide();
			$( "#mysql_dml_group" ).show();
			$('input[name=mysql_dml][value="select"]').prop("checked",true).trigger("click");
		}
	});

	$('input[name=mysql_ddl]').on("click",function(){
		var val = $('input[name=mysql_ddl]:checked').val();
		if(val=="create"){			// create tables
			$( "#mysql" ).val("CREATE TABLE ");
		}else{					// alter
			$( "#mysql" ).val("ALTER TABLE ");
		}
	});

	$('input[name=mysql_dml]').on("click",function(){
		var val = $('input[name=mysql_dml]:checked').val();
		if(val=="select"){			// insert
			$( "#mysql" ).val("SELECT ");
		}else if(val=="insert"){			// insert
			$( "#mysql" ).val("INSERT INTO ");
		}else if(val=="update"){		// update
			$( "#mysql" ).val("UPDATE ");
		}else{					// delete
			$( "#mysql" ).val("DELETE FROM ");
		}
	
	});

	$('input[name=mysql_choice][value="DML"]').prop("checked",true).trigger("click");
});
