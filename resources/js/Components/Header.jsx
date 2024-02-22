import logo from "../Assets/logo.png";
export default function Header() {
    return (
        <header className="bg-custom-primary p-4">
            <div className="container mx-auto flex items-center ">
                <img src={logo} alt="Logo" className="w-12 h-12"/>
                <div className="text-white text-2xl font-semibold">Planning Poker</div>
            </div>
        </header>
    );
}
