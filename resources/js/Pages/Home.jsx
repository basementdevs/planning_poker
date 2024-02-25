import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import PokerTable from "@/Components/PokerTable.jsx";
import PrimaryButton from "@/Components/PrimaryButton.jsx";

export default function Home({ auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <div className="relative flex items-center justify-center h-screen">
                <PokerTable className="mx-auto mt-[20px] animated-shake z-10" />
                    <PrimaryButton onClick className="pl-16  w-[300px] h-[50px] rounded-3xl absolute z-10   ">
                        <p className="font-semibold font-poppins font-xl">
                            Start New Game
                        </p>
                    </PrimaryButton>
            </div>
        </AuthenticatedLayout>
    );
}
