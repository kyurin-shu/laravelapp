<template>
    <div class="container">
        <p> 
            {{msg}} 
            <br>
            {{reverseMsg}} 
            <br>
            <v-slot></v-slot>
        </p>
        <hr>
        <input type="number" v-model="id">
        <button @click="doAction">click</button>
        <hr>
        <ul>
            <li v-for="(person, key) in people" :key="key">
                KEY={{key}} / {{person.id}}: {{person.name}} [{{person.mail}}] ({{person.age}})
            </li>
        </ul>

        <table>
            <th is="example-component"></th>
            <td is="example-component"></td>
        </table>
        <ul>
            <li is="example-component"></li>
            <li is="example-component"></li>
        </ul>
    </div>
</template>


<script>
import axios from 'axios'

export default {
    data() {
        return {
            msg: 'input person id:',
            id: '',
            people: []
        }
    },
    methods: {
        doAction() {
            axios
            .get('api/hello/show/' + this.id)
            .then(response => {
                const data = response.data;
                if (Array.isArray(data)) {
                    this.people = data;
                } else {
                    this.people = [data];
                }
                this.msg = 'get data!';
            })
            .catch(err => {
                console.log(err);
                this.msg = err.response.data.message;
                this.people = [];
            })
        }
    },
    computed: {
        reverseMsg() {
            return this.msg.split('').reverse().join('');
        }
    },
    mounted() {

    }
}
</script>