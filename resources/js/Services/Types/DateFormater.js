class DateFormater {

    toLocaleDateString(dateString) {
        if (dateString.length < 11) {
            dateString = dateString + 'T00:00:00';
        }

        const date = new Date(dateString);
        return date.toLocaleDateString('pt-BR');
    }

    todayStringDate() {

        const today = new Date();

        const month = today.getMonth() + 1;
        const day = today.getDate();
        const year = today.getFullYear();

        const formattedMonth = month.toString().padStart(2, '0');
        const formattedDay = day.toString().padStart(2, '0');

        return `${year}-${formattedMonth}-${formattedDay}`;
    }
}

export default new DateFormater();
