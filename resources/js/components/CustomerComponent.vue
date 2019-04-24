<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Customer Component</div>
                      <div class="card-body">
                    <form method="POST">
                      

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Customer Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" v-model="name" value="" required autofocus>

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> Customer Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" v-model="address" value="" required>

                              
                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Customer Phone</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" v-model="phone" required>

                              
                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                               
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" @click.prevent="customerDataSave()">SAVE
                                   
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                </div>
          <br>
          <div class="card">
            <div class="card-header">Customer List</div>
                <div class="card-body">
                    <div class="list-group">
                        <li v-for="(customer,index) in customers" class="list-group active">{{index+1}} . {{customer.name}}</li>

                    </div>
                </div>
            </div>
            </div>
            
        </div>
        
    </div>
</template>

<script>
    export default {

        data(){
            return {
                customers:{},
                posts:{},
                name:'',
                address:'',
                phone:''
            }
        },
        mounted() {
            //console.log('Component mounted.');
            this.getData();
        },
    

    methods:{

        customerDataSave()
        {
           // console.log('click')
            axios.post('/customer-save', {
                name:this.name,
                address:this.address,
                phone:this.phone
            })
            .then(function (response) {
                console.log(response);
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        getData(){
                axios.get('customer-list')
                .then(response => {
                    this.customers = response.data;
                })
                  .then(function (response) {
                    // handle success
                    
                    //console.log(response);
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .then(function () {
                    // always executed
                  });
        }
    }
}
</script>
