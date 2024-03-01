import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import  trelloLogo from '../../Assets/trelloIcon.png';
import {Link} from "@inertiajs/react";


const TrelloSettingsList = ({trello})=>{
     return (
        <Link >
            <div className="bg-blue-300 rounded-lg  h-[100px] w-[700px]" >

            </div>
        </Link>
    );
}

export default function List ({auth, settings}){
  return (
    <AuthenticatedLayout user ={auth.user}>
        <div className="flex mx-auto container mt-4 ">
            <TrelloSettingsList trello={settings.trello}/>
        </div>
    </AuthenticatedLayout>
  );
}
