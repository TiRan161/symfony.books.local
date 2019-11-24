<template>
    <div>
        <h2 class="center">My Application</h2>
        <div v-text="message"></div>
        {{ message }}
        {{words}}
        {{testArr}}
        {{users}}
        {{user}}
        {{el}}
        <ul>
            <li :key="word.id" v-for="word in words">{{ word }}</li>
        </ul>
        <ul>
            <li :key="word.id" v-for="word in users">{{ word }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: "A list of words",
                words: [],
                testArr: [],
                users: [
                    {id:0, name: 'Иван', surname: 'Иванов', book: [
                            {id:0, data: 1994, title: 'Kniga'},
                            {id:1, data: 2000, title: 'Azbyka'}
                        ]
                    },
                    {id:1, name: 'Петр', surname: 'Петров'},
                    ],
                user: [],
                el: []
            };
        },
         mounted() {

            this.users.push({id:2, name: 'Ivan', surname: 'Ivanov'});

            let el = document.querySelector("div[data-words]");

            let mywords = el.dataset.words.split(",");
             this.el = mywords;

            this.words.push.apply(this.words, mywords);
        }
    };
</script>

<style>
    .center {
        text-align: center;
    }
</style>