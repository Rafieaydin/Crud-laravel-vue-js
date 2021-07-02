<template>
    <div class="card">
        <!-- <div class="card-header">
                            <h4 class="card-title">Basic Inputs</h4>
                        </div> -->

        <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                    <form @submit.prevent="StoreForm()" action="/siswa" method="POST">
                        <div class="form-group">
                            <label for="basicInput">level</label>
                            <input type="text" class="form-control " id="basicInput" placeholder="Masukan Level"
                                v-model="form.level" v-bind:class="{ 'is-invalid': erorr.level }">
                            <div v-if="erorr.level" class="invalid-feedback">
                                {{ erorr.level[0]  }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="helpInputTop">jurusan</label>
                            <input type="text" class="form-control" id="helpInputTop" placeholder="Masukan Jurusan"
                                v-model="form.jurusan" v-bind:class="{ 'is-invalid': erorr.jurusan }">
                            <div v-if="erorr.jurusan" class="invalid-feedback">
                                {{ erorr.jurusan[0]  }}
                            </div>
                        </div>

                        <router-link to="/siswa" class="btn btn-danger">Kembali</router-link>
                        <button type="submit" class="btn btn-success">Submit</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                form: {
                    level: ' ',
                    jurusan: ' ',
                },
                option: [],
                erorr: [],
                data: {}
            }
        },
        methods: {
            StoreForm() {
                console.log(this.form)
                axios.post('/api/kelas', this.form).then((response) => {
                    if (response.data.status) {
                        // console.log(response.data.messege);
                        this.$noty.success(response.data.messege);
                        this.$router.push({
                            name: 'kelas',
                        });
                    }
                }).catch((erorr) => {
                    // console.log(erorr.response.data.errors);
                    this.erorr = erorr.response.data.errors
                })
            }
        },
    }

</script>
