<template>
    <div class="container-fluid">
        <div class="row">            
            <div class="col-lg-12 col-md-12">

                <h1 v-if="status == ''" class="text-center font fw2 text-secondary">Submit your Complaints here <i class="fa fa-hand-o-down text-info"></i></h1>            
                <div class="text-center font fw4 text-secondary" v-else>
                    <h2  class="text-center font fw2 text-success">
                        submitted successfully <i class="fa fa-check-circle text-success"></i>                        
                    </h2>
                    <h3  class="text-center font fw4 text-success">Your Complaint ID is  {{status}}</h3>
                    <p>we will get back to you through email. thank you</p>
                </div>
                <hr>    
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <br>
                <form method="POST" action="/submitForm" enctype="multipart/form-data">

                    <div class="form-group row">
                            <marquee>select old complain if this is the first time you are complaining</marquee>
                        <label for="email" class="col-md-4 col-form-label text-md-right">Mode<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" name="mode" v-model="mode">
                                <option value="0">New Complain</option>
                                <option value="1">Old Complain</option>
                            </select>                            
                        </div>
                    </div>
                    <span v-if="mode == 0">
                                           
                        <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text"  required="" v-model="email" name="email" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">Full Name<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text"  required="" v-model="fname" name="fname" class="form-control ">
                            </div>
                        </div>                                       
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Matric Number<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text"  required="" v-model="matric_number" name="matric_number" class="form-control ">
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Complain Title<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" required=""  class="form-control" v-model="ctitle" name="ctitle">
                            </div>
                        </div>                                       
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Complain<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <textarea class="form-control" required="" v-model="complain" name="complain" rows="5"></textarea>
                            </div>
                        </div>     
                    </span>    
                    <span v-else>
                        <div class="form-group row">
                        <label for="complaintID" class="col-md-4 col-form-label text-md-right">Complaints ID<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text"  required="" v-model="complaintID" name="complaintID" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Complain Title<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" required=""  class="form-control" v-model="ctitle" name="ctitle">
                            </div>
                        </div>                                       
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Complain<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <textarea class="form-control" required="" v-model="complain" name="complain" rows="5"></textarea>
                            </div>
                        </div>  
                    </span>       
                    <div class="form-group row">                        
                        <div class="col-md-8">                                                        </div>
                        <div class="col-md-4">                                                        
                            <input type="submit" value="Submit" class=" btn btn-success">
                        </div>
                    </div>                                                                                             
                </form>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
            </div>
        </div> 
    </div>
</template>

<script>
    export default {
        data(){
          return {
            email:'',
            fname:'',
            matric_number:'',
            ctitle:'',
            complain:'',
            mode:0,
            
            }
        },
        methods:{
           /* modeC:function(){
                if (this.mode == 0){

                }
            }*/
        },
        created(){
         
        },
        props:["status"],
        mounted() {


            $(document).ready(function(){
                AOS.init(); 
            });
        }
    }
</script>

<style>
   
</style>
