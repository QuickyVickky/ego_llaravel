import HomeComponent from "./components/HomeComponent.vue";
import sendAmountComponent from "./components/sendAmountComponent.vue";
import NotFound from "./components/NotFound";
import registerComponent from "./components/registerComponent";
import loginComponent from "./components/loginComponent";
import MyAccountComponent from "./components/MyAccountComponent";
import calculatorComponent from "./components/calculatorComponent";
import senderDetailsComponent from "./components/senderDetailsComponent";
import forgottenPasswordComponent from "./components/forgottenPasswordComponent";
import resetPasswordComponent from "./components/resetPasswordComponent";
import makeTransferComponent from "./components/makeTransferComponent";
import recipientComponent from "./components/recipientComponent";
import enterPaymentComponent from "./components/enterPaymentComponent";
import verifyOTP from "./components/verifyOTP";
import verificationComponent from "./components/verificationComponent";
import reviewDetails from "./components/reviewDetails";


export const routes = [
    { path: '*', component: NotFound },
    { path: '/', name: '', component: HomeComponent },
    { path: '/home', name: 'home', component: HomeComponent },
    { path: '/send', name: 'send', component: sendAmountComponent },
    { path: '/register', name: 'register', component: registerComponent },
    { path: '/login', name: 'login', component: loginComponent },
    { path: '/verify-otp', name: 'verify-otp', component: verifyOTP },
    { path: '/forgot-password', name: 'forgot-password', component: forgottenPasswordComponent },
    { path: '/reset-password/:token', name: 'reset-password', component: resetPasswordComponent },
    { path: '/myaccount', name: 'myaccount', component:  MyAccountComponent},
    { path: '/enterpayment', name: 'enterpayment', component: enterPaymentComponent },
    { path: '/senderdetail', name: 'senderdetail', component: senderDetailsComponent },
    { path: '/recipient', name: 'recipient', component: recipientComponent },
    { path: '/verification', name: 'verification', component: verificationComponent },
    { path: '/review', name: 'review', component: reviewDetails },
    { path: '/maketransfer', name: 'maketransfer', component: makeTransferComponent },
];

