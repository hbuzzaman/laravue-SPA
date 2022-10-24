<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Room</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Room Name</label>
                                    <input type="text" class="form-control" v-model="room.room_name">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
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
    name:"add-room",
    data(){
        return {
            room:{
                room_name:"",
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/room',this.room).then(response=>{
                this.$router.push({name:"roomList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>