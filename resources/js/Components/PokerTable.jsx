import '../../css/animation.css';
export default function PokerTable (props){
    const ellipsis = {
        width: "600px",
        height: "350px",
        backgroundColor: "#349966",
        borderRadius: "25% / 50%"
    };
    const borderWood = {
        border: "15px solid #AD7D4D"
    };
    const ellipsisBefore ={
        marginTop: "52px",
        marginLeft: "85px",
        width: "400px",
        height: "200px",
        backgroundColor:"transparent",
        position: "absolute",
        borderRadius: "25% / 50%",
        border: "20px solid rgba(255, 255, 255, 0.25)",
        content: "",
    };
    const card ={
        height: "80px",
        width: "50px",
        position: "absolute",
        backgroundColor: "rgb(208, 208, 208)",
        borderRadius: "6px",
    };
    const cardUp = {
        marginTop: "20px"
    };
    const cardDown ={
        marginTop:"200px"
    };

    return (
        <div {...props}>
            <div key="ellipsis" style={{ ...ellipsis, ...borderWood }}>
                <div key="ellipsis-before" style={{ ...ellipsisBefore }}></div>
                <div key="card-up-1" style={{ ...card, ...cardUp, marginLeft: "150px" }}></div>
                <div key="card-up-2" style={{ ...card, ...cardUp, marginLeft: "265px" }}></div>
                <div key="card-up-3" style={{ ...card, ...cardUp, marginLeft: " 370px" }}></div>
                <div key="card-down-1" style={{ ...card, ...cardDown, marginLeft: "150px" }}></div>
                <div key="card-down-1" style={{ ...card, ...cardDown, marginLeft: "265px" }}></div>
                <div key="card-down-1" style={{ ...card, ...cardDown, marginLeft: "370px" }}></div>
            </div>
        </div>
    )
}
