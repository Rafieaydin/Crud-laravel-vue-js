<template>
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class="px-3 py-3 d-flex justify-content-between">
                            <h3 class="card-title"> <i data-feather="user" style="width: 30px; height: 30px"></i> Siswa
                            </h3>
                        </div>
                        <div class="card-right ml-3 mb-4">
                            <p>{{ data.siswa }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class="px-3 py-3 d-flex justify-content-between">
                            <h3 class="card-title"> <i data-feather="home" style="width: 30px; height: 30px"></i> Kelas
                            </h3>
                        </div>
                        <div class="card-right ml-3 mb-4">
                            <p>{{ data.kelas }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                data: {
                    siswa: '0',
                    kelas: '0',
                }
            }
        },
        methods: {
            getAllData() {
                axios.get('/api/dashboard').then((response) => {
                    this.data = {
                        siswa: response.data.siswa,
                        kelas: response.data.kelas,
                    }
                })
            }
        },
        mounted() {
            this.getAllData();
        },
    }

</script>
