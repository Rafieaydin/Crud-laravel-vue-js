<template>
    <div class="card">
        <div class="card-body">
            <!-- button atas -->
            <template>
                <v-toolbar flat>
                    <v-toolbar-title>Data Siswa</v-toolbar-title>
                    <v-divider class="mx-4" inset vertical></v-divider>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" @click.prevent="tambahRoute()" dark class="mb-2">
                        Tambah Data
                    </v-btn>
                </v-toolbar>
            </template>
            <!-- end button atas -->
            <!-- header -->
            <v-card-title>
                <v-spacer></v-spacer>
                <!-- search engine -->
                <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details>
                </v-text-field>
            </v-card-title>
            <!-- end header -->
            <!-- table -->
            <!-- data table yang ini jadi make v-data-table jangan lupa iimport nya di app -->
            <!-- :header untuk header , : items untuk data , :search untuk search dan perpage untuk pagination -->
            <v-data-table :headers="headers" :items="data" :search="search" :items-per-page="10" class="elevation-2">
                <!-- header table -->

                <!--  action icon di json nya -->
                <template v-slot:item.action="{ item }">
                    <!-- icon menggunaka  v icon -->
                    <v-icon @click="editItem(item)">mdi-pencil</v-icon>
                    <v-icon color="error" @click="deleteItem(item)"> mdi-delete</v-icon>
                </template>
                <!-- end -->
            </v-data-table>
        </div>

    </div>

</template>


<script>
    export default {
        data() {
            return {
                headers: [{
                        text: 'NIPD', // nama header
                        value: 'nipd' //  value dari database
                    },
                    {
                        text: 'Nama Sisw',
                        value: 'nama'
                    },
                    {
                        text: 'level',
                        value: 'kelas.level' //  mengambil dari collection memakai with
                    },
                    {
                        text: 'jurusan',
                        value: 'kelas.jurusan' //  mengambil dari collection memakai with
                    },
                    {
                        text: 'No telp',
                        value: 'no_telp'
                    },
                    {
                        text: 'Actions',
                        value: 'action',
                        sortable: false,
                        align: 'center'
                    },
                ],
                data: [], // isi data yang ada du databse
                search: '',
                modelDelete: false
            }
        },
        methods: {
            GetData() {
                axios.get('/api/siswa').then((response) => {
                    this.data = response.data
                    // console.log(response.data); // data
                }).catch((eror) => {
                    console.log(eror);
                })
            },
            tambahRoute() {
                this.$router.push('/siswa/create')
            },
            deleteItem(item) {
                // item = collection or {}
                console.log(item.id);
                Swal.fire({
                    title: 'Apa anda yakin ?',
                    // text: "Jika sudah di hapus anda tidak bisa mengembalikanya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete('/api/siswa/' + item.id).then((response) => {
                            //  item = collection 
                            // idx ini buat hapus tanpa reload jadi data nya di hapus make splice
                            const idx = this.data.indexOf(item)
                            this.data.splice(idx, 1)

                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        })

                    }
                })

            },
            editItem(item) {
                this.$router.push('/siswa/' + item.id);
            }
        },

        mounted() {
            // this.Table(),
            this.GetData()
        },
    }

</script>
