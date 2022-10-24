<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"roomAdd"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Room</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Room Name</th>
                                    <th>action</th>

                                    
                                </tr>
                            </thead>
                            <tbody v-if="rooms.length > 0">
                                <tr v-for="(room,key) in rooms" :key="key">
                                    <td>{{ room.id }}</td>
                                    <td>{{ room.room_name }}</td>
                                    <td>
                                        <router-link :to='{name:"roomEdit",params:{id:room.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteRoom(room.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No Rooms Found.</td>
                                </tr>
                            </tbody>
                        </table>
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
            rooms:[]
        }
    },
    mounted(){
        this.getRooms()
    },
    methods:{
        async getRooms(){
            await this.axios.get('/api/room').then(response=>{
                this.rooms = response.data.data //response.data=memanggil semua data yang ada pada controller. 
                //response.data.data=memasukan response data:[] kedalam rooms[]/array kosong yang isinya response dari api/room
            }).catch(error=>{
                console.log(error)
                this.rooms = []
            })
        },
        deleteRoom(id){
            if(confirm("Are you sure to delete this room ?")){
                this.axios.delete(`/api/room/${id}`).then(response=>{
                    this.getRooms()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    },
}
</script>