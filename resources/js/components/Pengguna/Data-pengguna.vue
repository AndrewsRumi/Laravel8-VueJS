<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data User</h3>
                        <div class="card-tools">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th style="font-size: 20px; min-width: 5cm;">Unit Area</th>
                                        <th style="font-size: 20px; min-width: 5cm;">Nama Perusaaan</th>
                                        <th style="font-size: 20px; min-width: 5cm;">No KTP</th>
                                        <th style="font-size: 20px; min-width: 5cm;">Direktur</th>
                                        <th style="font-size: 20px; min-width: 5cm;">Wakil Direktur</th>
                                        <th style="font-size: 20px; min-width: 5cm;">No HP Direktur</th>
                                        <th style="font-size: 20px; min-width: 5cm;">No Hp Wakil Direktur</th>
                                        <th style="font-size: 20px; min-width: 5cm;">Telepon Perusahaan</th>
                                        <th style="font-size: 20px; min-width: 5cm;">Email</th>
                                        <th style="font-size: 20px; min-width: 5cm;">Kota</th>
                                        <th style="font-size: 20px; min-width: 5cm;">Alamat</th>
                                        <th style="font-size: 20px; min-width: 5cm;">Nomor SIUP</th>
                                        <th style="font-size: 20px; min-width: 5cm;">Tanggal SIUP</th>
                                        <th style="font-size: 20px; min-width: 5cm;">Website</th>
                                        <th style="font-size: 20px; min-width: 5cm;">Bidang Usaha</th>
                                        <th style="font-size: 20px; min-width: 5cm;" >Level</th>
                                        <th style="font-size: 20px; min-width: 5cm;">Aksi</th>

                                    </tr>

                                    <tr v-for="item in users" :key="item.id">
                                        <td>{{ item.unitAREA }}</td>
                                        <td>{{ item.nama_perusahaan }}</td>
                                        <td>{{ item.noKTP }}</td>
                                        <td>{{ item.direktur }}</td>
                                        <td>{{ item.direktur_wakil }}</td>
                                        <td>{{ item.hp_direktur }}</td>
                                        <td>{{ item.hp_direktur_wakil }}</td>
                                        <td>{{ item.telepon_perusahaan }}</td>
                                        <td>{{ item.email }}</td>
                                        <td>{{ item.kota }}</td>
                                        <td>{{ item.alamat }}</td>
                                        <td>{{ item.siup_no }}</td>
                                        <td>{{ item.siup_tanggal }}</td>
                                        <td>{{ item.website }}</td>
                                        <td>{{ item.bidang_usaha }}</td>
                                        <td>{{ item.level_id }}</td>

                                        <td>
                                            <a
                                                href="#"
                                                @click="showModalEdit(item)"
                                                ><i class="fas fa-edit blue"></i
                                            ></a>
                                            |<a
                                                href="#"
                                                @click="deleteData(item.id)"
                                                ><i
                                                    class="fas fa-trash-alt red"
                                                ></i
                                            ></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
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
            loading: false,
            disabled: false,
            levels: {},
            users: {},
            statusmodal: false,
            form: new Form({
                id: "",
                name: "",
                level_id: "",
                email: "",
                password: ""
            })
        };
    },
    methods: {
        showModal() {
            this.statusmodal = false;
            this.form.reset();
            $("#modalmuncul").modal("show");
        },
        showModalEdit(item) {
            this.statusmodal = true;
            this.form.reset();
            $("#modalmuncul").modal("show");
            this.form.fill(item);
        },
        loadData() {
            this.$Progress.start();
            axios
                .get("api/ambildatalevel")
                .then(({ data }) => (this.levels = data));
            axios.get("api/user").then(({ data }) => (this.users = data));
            this.$Progress.finish();
        },
        simpanData() {
            this.$Progress.start();
            this.loading = true;
            this.disabled = true;
            this.form
                .post("api/user")
                .then(() => {
                    Fire.$emit("refreshData");
                    $("#modalmuncul").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Data Berhasil Tersimpan"
                    });
                    this.$Progress.finish();
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(() => {
                    this.$Progress.fail();
                    this.loading = false;
                    this.disabled = false;
                });
        },
        ubahData() {
            this.$Progress.start();
            this.loading = true;
            this.disabled = true;
            this.form
                .put("api/user/" + this.form.id)
                .then(() => {
                    Fire.$emit("refreshData");
                    $("#modalmuncul").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Data Berhasil Terupdate"
                    });
                    this.$Progress.finish();
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(() => {
                    this.$Progress.fail();
                    this.loading = false;
                    this.disabled = false;
                });
        },
        deleteData(id) {
            Swal.fire({
                title: "Anda Yakin Ingin Menghapus Data Ini ?",
                text: "Klik Cancel Untuk Membatalkan Penghapusan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus"
            }).then(result => {
                if (result.value) {
                    this.form
                        .delete("api/user/" + id)
                        .then(() => {
                            Swal.fire(
                                "Terhapus",
                                "Data Anda Sudah Tehapus",
                                "success"
                            );
                            Fire.$emit("refreshData");
                        })
                        .catch(() => {
                            Swal.fire(
                                "Gagal",
                                "Data Gagal Terhapus",
                                "warning"
                            );
                        });
                }
            });
        }
    },
    created() {
        this.loadData();
        Fire.$on("refreshData", () => {
            this.loadData();
        });
    }
};
</script>
