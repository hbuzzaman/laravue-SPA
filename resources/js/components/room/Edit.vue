<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Room</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Room Name</label>
                                    <input type="text" class="form-control" v-model="room.room_name">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"update-room",
    data(){
        return {
            room:{
                room_name:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showRoom()
    },
    methods:{
        async showRoom(){
            await this.axios.get(`/api/room/${this.$route.params.id}`).then(response=>{
                const { room_name } = response.data.data
                this.room.room_name = room_name //menampilkan pada view v-model="" yang berisi room_name didapat dari const { room_name } = response.data.data
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/room/${this.$route.params.id}`,this.room).then(response=>{
                this.$router.push({name:"roomList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>