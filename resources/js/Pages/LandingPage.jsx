export default function LandingPage() {
    return (
        <div className="flex flex-col items-center justify-center h-screen bg-[#FBFBFE]">
            <h2 className="text-[30px] font-bold text-[#DEDCFF]">
                Real time. Collaborative. Simple story point estimation.
            </h2>
            <h1 className="text-[80px] font-bold text-[#2F27CE] mt-[17px] mb-[42px]">
                Planning Poker
            </h1>
            <a
                href="#"
                className="px-[110px] py-4 text-[#FBFBFE] text-[25px] bg-[#443DFF] font-bold rounded-full transition hover:bg-[#8480FF] hover:scale-105"
            >
                Start new game
            </a>
        </div>
    );
}
