<template>
    <div class="row" v-if="quotesRequirement != null">
        <div class="col-sm-4" v-for="(field,index) in quotesRequirement.fields" :key="index">

            <div class="form-group" v-if="field.group['0'].type == 'select'">
                <label class="signin-label" :for="field.group['0'].key">{{ field.name }}</label>
                <select :id="field.group['0'].key" :name="'details.'+field.group[0].key" class="form-control" >
                    <option v-for="(option,index) in field.group['0'].valuesAllowed" :value="option.key">
                        {{ option.name }}
                    </option>
                </select>
            </div>

            <div class="form-group" v-else-if="field.group['0'].type == 'radio'">
                <label class="signin-label" :for="field.group['0'].key">{{ field.name }}</label>
                <br>
                <div class="form-check form-check-inline mt-10" v-for="(option,index) in field.group['0'].valuesAllowed" :key="index">
                    <input class="form-check-input"
                           type="radio"
                           :name="'details.'+field.group[0].key"
                           :id="option.key"
                           :value="option.key">
                    <label class="form-check-label" :for="option.key">{{ option.name }}</label>
                </div>
            </div>
            <div class="form-group" v-else>
                <label class="signin-label" :for="field.group['0'].key">{{ field.name }}</label>
                <input type="text" :name="'details.'+field.group[0].key" :id="field.group['0'].key" class="form-control"
                       :placeholder="field.group['0'].example">
            </div>
            <has-error :form="recipientForm" :field="field.group['0'].key"></has-error>
        </div>
    </div>
</template>


<script>


    export default {
        props: ['quotesRequirement','recipientForm'],
        data() {
            return {
            }

        },
        mounted() {
            console.log("quotesRequirement:",this.quotesRequirement);
        },
        created() {

        },
        methods: {

        },
        watch: {
        }
    }
</script>
<style lang="scss" scoped>

</style>
