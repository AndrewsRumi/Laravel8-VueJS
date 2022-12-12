<template>

        <div  class="content-wrapper" >
        <section   class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1 style="center">Data Vendor</h1>
    </div>



        <div class="col-sm-100">
        <ol class="breadcrumb float-sm-right">
        </ol>
        </div>
        </div>
        </div>
        </section>

            <section class="content">
            <div class="container-fluid" >
            <div class="row">
            <div class="col-12">
            <div class="col-md-10">

                    <div class="card card primary">
                    <div class="card-header">
                        </div>

                    <form
                        @submit.prevent="  statusmodal ? ubahData() : simpanData()">

                        <div class="card-body">
                        <div class="form-group">
                        <label>Unit Area</label>
                        <input type="text" v-model="form.unitAREA" class="form-control"
                            :class="{'is-invalid': form.errors.has('unitAREA')}"
                                    placeholder="Unit Area" />
                                <has-error
                                    :form="form" field="unitAREA">
                                </has-error>
                            </div>


                        <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input type="text" v-model="form.nama_perusahaan" class="form-control"
                            :class="{'is-invalid': form.errors.has('nama_perusahaan')}"
                                    placeholder="Nama Perusahaan" />
                                <has-error
                                    :form="form" field="nama_perusahaan">
                                </has-error>
                            </div>


                        <div class="form-group">
                        <label>No KTP</label>
                        <input type="number" v-model="form.noKTP" class="form-control"
                            :class="{'is-invalid': form.errors.has('noKTP')}"
                                    placeholder="No KTP" />
                                <has-error
                                    :form="form" field="noKTP">
                                </has-error>
                            </div>


                        <div class="form-group">
                        <label>Nama Direktur</label>

                        <input type="text" v-model="form.direktur" class="form-control"
                            :class="{'is-invalid': form.errors.has('direktur')}"
                                    placeholder="Direktur" />
                                <has-error
                                    :form="form" field="direktur">
                                </has-error>
                            </div>


                        <div class="form-group">
                        <label>Nama Direktur Wakil</label>
                        <input type="text" v-model="form.direktur_wakil" class="form-control"
                            :class="{'is-invalid': form.errors.has('direktur_wakil')}"
                                    placeholder="Wakil Direktur" />
                                <has-error
                                    :form="form" field="direktur_wakil">
                                </has-error>
                            </div>

                        <div class="form-group">
                        <label>No HP Direktur</label>
                        <input type="number" v-model="form.hp_direktur" class="form-control"
                            :class="{'is-invalid': form.errors.has('hp_direktur')}"
                                    placeholder="No HP Direktur" />
                                <has-error
                                    :form="form" field="hp_direktur">
                                </has-error>
                            </div>

                        <div class="form-group">
                        <label>No HP Direktur Wakil</label>
                        <input type="number" v-model="form.hp_direktur_wakil" class="form-control"
                            :class="{'is-invalid': form.errors.has('hp_direktur_wakil')}"
                                    placeholder="No HP Wakil Direktur" />
                                <has-error
                                    :form="form" field="hp_direktur_wakil">
                                </has-error>
                            </div>

                        <div class="form-group">
                        <label>Telepon Perusahaan</label>
                        <input type="number" v-model="form.telepon_perusahaan" class="form-control"
                            :class="{'is-invalid': form.errors.has('telepon_perusahaan')}"
                                    placeholder="Telepon Perusahaan" />
                                <has-error
                                    :form="form" field="telepon_perusahaan">
                                </has-error>
                            </div>


                        <div class="form-group">
                        <label>Email</label>
                        <input type="text" v-model="form.email" class="form-control"
                            :class="{'is-invalid': form.errors.has('email')}"
                                    placeholder="Email" />
                                <has-error
                                    :form="form" field="email">
                                </has-error>
                            </div>


                        <div class="form-group">
                        <label>Kota</label>
                        <input type="text" v-model="form.kota" class="form-control"
                            :class="{'is-invalid': form.errors.has('kota')}"
                                    placeholder="Kota" />
                                <has-error
                                    :form="form" field="kota">
                                </has-error>
                            </div>

                        <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" v-model="form.alamat" class="form-control"
                            :class="{'is-invalid': form.errors.has('alamat')}"
                                    placeholder="Alamat" />
                                <has-error
                                    :form="form" field="alamat">
                                </has-error>
                            </div>

                        <div class="form-group">
                        <label>SIUP no</label>
                        <input type="number" v-model="form.siup_no" class="form-control"
                            :class="{'is-invalid': form.errors.has('siup_no')}"
                                    placeholder="Nomor SIUP" />
                                <has-error
                                    :form="form" field="siup_no">
                                </has-error>
                            </div>


                        <div class="form-group">
                        <label>SIUP tanggal</label>
                        <input type="date" v-model="form.siup_tanggal" class="form-control"
                            :class="{'is-invalid': form.errors.has('siup_tanggal')}"
                                    placeholder="Tanggal SIUP" />
                                <has-error
                                    :form="form" field="siup_tanggal">
                                </has-error>




                        </div><div class="form-group">
                        <label>Bidang Usaha</label>
                        <input type="text" v-model="form.bidang_usaha" class="form-control"
                            :class="{'is-invalid': form.errors.has('bidang_usaha')}"
                                    placeholder="Bidang Usaha" />
                                <has-error
                                    :form="form" field="bidang_usaha">
                                </has-error>
                            </div>

                        <div class="form-group">
                        <label>Website</label>
                        <input type="text" v-model="form.website" class="form-control"
                            :class="{'is-invalid': form.errors.has('website')}"
                                    placeholder="Website" />
                                <has-error
                                    :form="form" field="website">
                                </has-error>
                        </div>

                        <div class="form-group">
                        <label>Pilih Status</label>
                        <select class="form-control select2" v-model="form.level_id"
                            :class="{'is-invalid': form.errors.has('level_id')}" aria-label="Default select example">
                         <option value> Pilih Status </option>
                         <option v-for="item in levels" :key="item.id" :value="item.id">
                                {{ item.namalevel }} </option>
                                </select>
                                <has-error
                                    :form="form" field="level_id">
                                </has-error>
                            </div>

                        <div class="card-footer">
                        <div class="col-12">
                        <button type="button" class="btn btn-primary float-right" data-dismiss="modal"> Close </button>
                        <button type="submit" class="btn btn-success float-right" style="margin-right: 5px;"  :disabled="disabled" v-show="!statusmodal" >
                            <i v-show="loading" class="fa fa-spinner fa-spin"></i> Simpan </button>
                        </div>
                        </div>

                        </div>
                    </form>
                    </div>
                    </div>
                    </div>
                </div>
        </div>
    </section>
</div>




        <!-- /Modal -->


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
                unitAREA:"",
                nama_perusahaan:"",
                noKTP:"",
                direktur:"",
                direktur_wakil:"",
                hp_direktur:"",
                hp_direktur_wakil:"",
                telepon_perusahaan:"",
                email: "",
                kota:"",
                alamat:"",
                siup_no:"",
                siup_tanggal:"",
                website:"",
                bidang_usaha:"",
                level_id: "",

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
