import TrelloForm from "@/Components/TrelloSettingsForm.jsx";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.jsx";
import ComingSoon from "@/Components/ComingSoon.jsx";


export  default  function Platform ({auth, platform, settings}){
    let platformFormSettings = <ComingSoon className="mt-10 mr-[10px] ml-[10px]"/>;
    if( platform === 'trello'){
        platformFormSettings = <TrelloForm  className="mt-10 mr-[10px] ml-[10px]"/>;
    }

    if (!settings){
        console.log(settings);
    }

    return (
        <AuthenticatedLayout user={auth.user}>
            {platformFormSettings}
        </AuthenticatedLayout>
    );
}
