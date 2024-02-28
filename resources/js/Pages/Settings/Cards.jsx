import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.jsx";
import ComingSoon from "@/Components/ComingSoon.jsx";

const TrelloCard = ({ card }) => {
    return (
        <div className="flex items-center border-b p-4">
            <img className="w-16 h-16 rounded-full mr-4" src={card.image_url} alt={`Card of ${card.name}`} />
            <div className="flex-1">
                <h2 className="text-lg font-semibold mb-2">{card.name}</h2>
                <p className="text-gray-700 mb-2">{card.description}</p>
                <div className="flex items-center mb-2">
                    <span className="text-gray-600 text-sm mr-2">{card.role}</span>
                    <span className={`bg-${card.label_color} text-white py-1 px-2 rounded text-sm`}>{card.label}</span>
                </div>
                <p className="text-sm text-gray-600">{card.membership_status}</p>
            </div>
        </div>
    );
};



const Trello = ({ cards }) => {
    return (
        <div>
            //TODO
        </div>
    );
}

const CardsPlatformManager  = ({platform, cards})=>{
    if (platform === 'trello'){
        return <Trello cards={cards}/>
    }
    return <ComingSoon className="mt-20 mr-4 ml-4"/>
}

export  default  function Cards({auth, cards, platform}){



    return (
        <AuthenticatedLayout user={auth.user}>
            <h3 className="text-4xl font-semibold text-center mt-5">
                Pick the cards  for this session
            </h3>
            <CardsPlatformManager platform={platform} cards={cards}/>
        </AuthenticatedLayout>
    );
}
