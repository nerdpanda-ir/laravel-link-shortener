export default class LoginService {
    static execute(){
        let toasts = window.document.body.querySelectorAll('.toast');
        toasts = Array.from(toasts);
        const boostrapToastsObjects = toasts.map((toast)=> new bootstrap.Toast(toast));
        boostrapToastsObjects.forEach((element,index)=>{
            if (index!=0)
                window.setTimeout(function (){
                    element.show();
                },index*185+500);
            else
                element.show();
        });
    }
}
