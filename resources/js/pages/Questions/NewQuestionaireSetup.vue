<template>
    <div v-if="active===0">
        <h1>Select Categories:</h1>
    <el-checkbox :indeterminate="isIndeterminate" v-model="checkAll" @change="handleCheckAllChangeCategory">Check all</el-checkbox>
    <div style="margin: 15px 0;"></div>
    <el-checkbox-group v-model="checkedCategories" @change="handleCheckedCategoriesChange">
        <el-checkbox v-for="category in categories" :label="category" :key="category">{{category}}</el-checkbox>
    </el-checkbox-group>
    </div>
    <div v-if="active===1">
        <h1>Select Difficulty:</h1>
        <el-checkbox :indeterminate="isIndeterminate" v-model="checkAll" @change="handleCheckAllChangeDifficulty">Check all</el-checkbox>
        <div style="margin: 15px 0;"></div>
        <el-checkbox-group v-model="checkedDifficulties" @change="handleCheckedDifficultiesChange">
            <el-checkbox v-for="difficulty in difficulties" :label="difficulty" :key="difficulty">{{difficulty}}</el-checkbox>
        </el-checkbox-group>
    </div>
    <div v-if="active===2">
        <el-progress type="circle" :percentage="100" status="success">
            <el-button type="success" icon="el-icon-check" circle></el-button>
        </el-progress>
    </div>

    <el-steps :active="active" finish-status="success">
        <el-step title="Step 1"></el-step>
        <el-step title="Step 2"></el-step>
    </el-steps>

    <el-button style="margin-top: 12px;" @click="next" :disabled="done || checkedCategories<1 ||(active===1 && checkedDifficulties<1)">Next step</el-button>
</template>

<script>
const categoryOptions = ['SQL', 'Linux', 'Code', 'Docker'];
const difficultyOptions = ['Easy','Medium','Hard'];
export default {
    data() {
        return {
            active: 0,
            done : false,
            checkAll: false,
            checkedCategories: [],
            categories : categoryOptions,
            cities: categoryOptions,
            checkedDifficulties : [],
            difficulties : difficultyOptions,
            isIndeterminate: true
        };
    },

    methods: {
        next() {
            // if (this.active++ > 2) this.active = 0;
            if (this.active++ > 1) this.done = true;
        },
        handleCheckAllChangeCategory(val) {
            this.checkedCities = val ? categoryOptions : [];
            this.isIndeterminate = false;
        },
        handleCheckedCategoriesChange(value) {
            let checkedCount = value.length;
            this.checkAll = checkedCount === this.cities.length;
            this.isIndeterminate = checkedCount > 0 && checkedCount < this.cities.length;
        },
        handleCheckAllChangeDifficulty(val) {
            this.checkedDifficulties = val ? difficultyOptions : [];
            this.isIndeterminate = false;
        },
        handleCheckedDifficultiesChange(value) {
            let checkedCount = value.length;
            this.checkAll = checkedCount === this.difficulties.length;
            this.isIndeterminate = checkedCount > 0 && checkedCount < this.difficulties.length;
        },

        // Call to store to create a request to the back-end to bring questions by the desired categories and difficulty level ->
        // this need to be stored in the store in an object
        createQuestionaire() {

            data = {
                difficulty : this.checkedDifficulties,
                categories : this.checkedCategories
            }

            try {


            }catch (e) {
                console.log(e);
            }
        }

    },
    created() {

    }
}
</script>
