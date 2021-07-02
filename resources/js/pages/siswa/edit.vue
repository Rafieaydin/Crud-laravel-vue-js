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
                            <label for="basicInput">Nipd</label>
                            <input type="text" class="form-control " id="basicInput" placeholder="Masukan Nipd"
                                v-model="form.nipd" v-bind:class="{ 'is-invalid': erorr.nipd }">
                            <div v-if="erorr.nipd" class="invalid-feedback">
                                {{ erorr.nipd[0]  }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="helpInputTop">Nama Siswa</label>
                            <input type="text" class="form-control" id="helpInputTop" placeholder="Masukan Nama siswa"
                                v-model="form.nama" v-bind:class="{ 'is-invalid': erorr.nama }">
                            <div v-if="erorr.nama" class="invalid-feedback">
                                {{ erorr.nama[0]  }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="helperText">kelas</label>
                            <select class="form-control" v-bind:class="{ 'is-invalid': erorr.id_kelas }" name="" id=""
                                v-model="form.id_kelas">
                                <option value="">-- Pilih kelas --</option>
                                <option v-for="options in option" v-bind:value="options.id">
                                    {{ options.level+' '+options.jurusan }}</option>
                            </select>
                            <div v-if="erorr.id_kelas" class="invalid-feedback">
                                {{ erorr.id_kelas[0]  }}
                            </div>
                            <!-- <p><small class="text-muted"></small> -->
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="helperText">Nomor Telepon</label>
                            <input type="text" id="helperText" class="form-control" placeholder="Masukan Nomor telepon"
                                v-model="form.no_telp" v-bind:class="{ 'is-invalid': erorr.no_telp }">
                            <div v-if="erorr.no_telp" class="invalid-feedback">
                                {{ erorr.no_telp[0]  }}
                            </div>
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="helperText">Almat</label><br>
                            <textarea name="" id="" class="form-control" v-bind:class="{ 'is-invalid': erorr.alamat }"
                                rows="3" v-model="form.alamat"></textarea>
                            <div v-if="erorr.alamat" class="invalid-feedback">
                                {{ erorr.alamat[0]  }}
                            </div>
                            </p>
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
        props : ['id'],
        data() {
            return {
                form: {
                    nipd: ' ',
                    nama: ' ',
                    id_kelas: ' ',
                    no_telp: ' ',
                    alamat: ' ',
                },
                option: [],
                erorr: [],
                data: {}
            }
        },
        methods: {
            getValueOption() {
                axios.post('/api/option/value', this.data).then((response) => {
                    this.option = response.data;
                    // console.log(this.option);
                });
            },
            getData() {
                axios.get('/api/siswa/' + this.id + '/edit').then((response) => {
                    this.form = { // add data to v-model="form.*" 
                        nipd: response.data.nipd,
                        nama: response.data.nama,
                        id_kelas: response.data.id_kelas,
                        no_telp: response.data.no_telp,
                        alamat: response.data.alamat,
                    }
                });
            },
            
            StoreForm() {
                console.log(this.form.id_kelas);
                axios.put('/api/siswa/'+ this.id, this.form).then((response) => {
                    if (response.data.status) {
                        // console.log(response.data.messege);
                        this.$noty.success(response.data.messege);
                        this.$router.push({
                            name: 'siswa',
                        });
                    }
                }).catch((erorr) => {
                    // console.log(erorr.response.data.errors);
                    this.erorr = erorr.response.data.errors
                })
            }
        },
        mounted() {
            this.getValueOption(),
            this.getData()
        },
    }

</script>
