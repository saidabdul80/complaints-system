<template>
	<div class="row m-0 p-0 line">
		<span @click="showMenu" style="border: 1px solid #eee; border-radius: 5px; position: absolute; top: 7px; left:7px;z-index: 100;" class="display-none show-left-menu fa fa-align-left text-secondary bg-white fs-2 p-2"></span>
		<div id="inbox-side-menu" class="p-0 col-lg-4 col-md-5 col-sm-12 bg-light mobile-display-none">			
			<div  class="w-100 bg-white pb-3 pt-2 pl-3 display-flex flex-wrap shadow-sm">
				<input type="text" class="form-control w-75 " id="search-criteria" placeholder="Search" name="">
				<i class="fa fa-envelope-o mx-2 text-success"></i>
				<i class="fa fa-envelope-open-o text-success"></i>
			</div>
			<div style="height: 73vh;overflow-y: scroll;">
				<div v-for="message in messages" v-bind:class="{read:message.is_read==0}"  class="py-3 pl-3 display-flex wrap complain-cad" @click="showMessage(message, $event.target)">
					<i class="fa fa-tag fs-1 text-info c-circle"></i>
					<span>
						<span class="fs-1 font fw3 d-block">{{message.title}}</span>					
						<i class="fs-01 font fw3">{{message.complaints_ID}}</i>						
					</span>
				</div>				
			</div>
		</div>
		<div class="col-lg-8 col-md-7 col-sm-12 px-5" style="background: #fcfffc; overflow-y: scroll;height: 84vh;">
			<br>
			<div v-if="ctitle != ''">
				<div class="row bg-white shadow-sm py-2">
					<div class="col-lg-10 col-md-8 col-sm-12 mt-4">						
						<h3 class="font fw4" style="text-transform: capitalize;">{{ctitle}}</h3>
						<span class="mb-2 text-primary fs-01" @click="toView" style="cursor: pointer;user-select: none; display: block;">
							View More <i id="viewIcon" class="fa fa-angle-down rotate"></i>
						</span>						
						<div id="toView" style="border: 1px solid #eee; border-radius: 5px;padding: 8px;">			
							<p class="my-0 font fs-01">From: <i class="text-success">{{email}}</i></p>
							<p class="my-1 fs-01">Matric Number: <i class="text-success"> {{matric_number}}</i></p>
							<p class="my-0 fs-01">Date: <i class="text-success">{{date}}</i></p>					
							<p class="my-0 fs-01">Complaint ID: <i class="text-success">{{complaint_id}}</i></p>	
						</div>
					</div>				
					<div class="col-lg-2 col-md-4 col-sm-6 display-flex">
						<div id="loader" class="loader display-none"></div>
						<i @click="sendDefaultMessage" class="fa fa-envelope text-secondary btn-r" title="send a default resolved message"></i>
						<i class=" ml-2 fa fa-reply text-secondary btn-r"></i>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 msg-body  mx-1 my-3">
						<div v-for="chat in chats" class="row w-100">
							<div v-if="chat.is_user==1" class="msg-bg msg-cont1 p-2 col-lg-12 col-md-10 col-sm-12 text-secondary">
								{{chat.response}}
							</div>					
							<div v-else class="msg-bg msg-cont2 p-2 col-lg-12 col-md-10 col-sm-12">
								{{chat.response}}
							</div>							
						</div>
					</div>
				</div>				
			</div>
			<div v-else class="display-flex flex-wrap">
				<h1 class="text-light">Message Box</h1>
			</div>
		</div>
		
	</div>
</template>

<script>
    export default {
        data(){
          return {
          	date:'',
            email:'',
            fname:'',
            matric_number:'',
            ctitle:'',
            complain:'',
            mode:0,
            complaint_id:'',
            messages:[],
            chats:{},
            
            }
        },
        methods:{
        	sendDefaultMessage: function(){       
        			$('#loader').show(); 			
        		$.post("/send_resolve_message", {fname:this.fname,email:this.email,complaints_ID:this.complaint_id,title:this.title}, function(result){          				
        			if (result == 1){
        				$('#loader').hide();
        				Swal.fire('sent');
        			}           	
	            });
        	},
        	showMessage: function (obj,e){
    			this.ctitle = obj.title;
    			this.matric_number = obj.matric_number;
    			this.complain = obj.complain;
    			this.fname = obj.fname;
    			this.email = obj.email;
    			this.complaint_id = obj.complaints_ID;
    			this.date = this.formatDate(obj.created_at);
    			this.chats = obj.sub_complaints;
    			if (obj.is_read == 0) {    				
	    			$(e).removeClass('read');
	    			$.post("/read_message", {id:obj.id}, function(result){                	
	            	});
    			}
        	},
        	toView:function(){
        		$('#viewIcon').toggleClass('rotate');
        		$('#toView').slideToggle(100);
        	},
        	showMenu: function(){        		
        		$('#inbox-side-menu').slideToggle(50);
        	},
        	formatDate:function(date) {
			    var d = new Date(date),
			        month = '' + (d.getMonth() + 1),
			        day = '' + d.getDate(),
			        year = d.getFullYear();

			    if (month.length < 2) 
			        month = '0' + month;
			    if (day.length < 2) 
			        day = '0' + day;

			    return [year, month, day].join('-');
			}
           /* modeC:function(){
                if (this.mode == 0){

                }
            }*/
        },
        created(){
          var $this = this;
            /*this.show_loader();*/
            $.post("/get_messages", {}, function(result){
                $this.messages = result;
            });
        },
        props:["status"],
        mounted() {
        		$(document).ready(function(){
        			$('#search-criteria').keyup(function(){
					    $('.contact-name').hide();
					   var txt = $('#search-criteria').val();
					   $('.contact-name:contains("'+txt+'")').show();
					});
        		})

            $(document).ready(function(){
                AOS.init(); 
            });
        }
    }
</script>

<style scoped="">
#app #main.py-4{
	padding: 0px !important;
}   
.line{
	border-top: 1px solid #eef;	

}
.complain-cad{
	border-bottom: 1px solid #eeeeef;
	cursor: pointer;	
}
.complain-cad:hover,.complain-cad:hover > i{
	background-color: #55556f;
	color: white !important;
}
.read{
	background-color: ivory;
}
.msg-bg{
	
}
.unsolved{
	background-color: beige;
}
.btn-r{
	cursor: pointer;
}
.btn-r:hover{
	color: #555 !important;
}

.msg-cont1{
	border-radius:0px 20px 20px 20px;	
	border:1px  solid #eee;
	background-color: whitesmoke;
	margin-top: 5px;
	min-height: 
}
.msg-cont2{
	background-color: rgba(130,190,155,.1);
	margin-top: 5px;	
	border-radius:20px 20px 0px 20px;	
	border:0px 50px 50px 50px solid #375;	
}
.wrap{
	flex-wrap: wrap;
	align-items: center;
}
.c-circle{
	padding: 15px; 
	box-shadow: 1px 1px 2px #ccc;
	border-radius: 50%;
	background: white;
	margin-right: 10px;
}
.rotate{
	transform: rotate(180deg);
}
</style>
