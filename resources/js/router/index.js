import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';

import Books from '../components/Books';
import AddBook from '../components/AddBook';
import EditBook from '../components/EditBook';
import UnAnsweredQuestions from '../pages/Questions/UnAnsweredQuestions';
import AnsweredQuestions from "../pages/Questions/AnsweredQuestions";
import Questions from "../pages/Questions/Questions";
import QuestionsByCategory from "../pages/Questions/QuestionsByCategory";
import NewQuestionaireSetup from "../pages/Questions/NewQuestionaireSetup";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'books',
        path: '/books',
        component: Books
    },
    {
        name: 'addbook',
        path: '/books/add',
        component: AddBook
    },
    {
        name: 'editbook',
        path: '/books/edit/:id',
        component: EditBook
    },
    {
        name: 'questions',
        path : '/questions',
        component: Questions
    },
    {
      name: 'unansweredquestions',
      path : '/questions/unansweredquestions',
      component: UnAnsweredQuestions
    },
    {
        name: 'answeredquestions',
        path : '/questions/answeredquestions',
        component: AnsweredQuestions
    },
    {
        name: 'questionsByCategory',
        path : '/questions/questionsByCategory',
        component: QuestionsByCategory
    },
    {
        name: 'newQuestionaire',
        path : '/questions/newQuestionaire',
        component: NewQuestionaireSetup
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
