import moment from 'moment'

moment.prototype.previousDay = function () {
  return this.subtract(1, 'day')
}

moment.prototype.nextDay = function () {
  return this.add(1, 'day')
}

moment.prototype.toSimpleDateString = function () {
  return this.format('YYYY-MM-DD')
}

moment.prototype.isMonday = function () {
  return this.isoWeekday() === 1
}

moment.prototype.isTuesday = function () {
  return this.isoWeekday() === 2
}

moment.prototype.isToday = function () {
  return this.isSame(moment(), 'day')
}

moment.prototype.monthsFromNow = function () {
  return this.diff(moment(), 'months')
}

moment.prototype.closestWeekday = function (weekdayIdentifier) {
  const today = moment().isoWeekday()

  return today <= weekdayIdentifier
    ? moment().isoWeekday(weekdayIdentifier)
    : moment().add(1, 'weeks').isoWeekday(weekdayIdentifier)
}

moment.prototype.toSimpleDateTimeString = function () {
  return this.format('YYYY-MM-DD hh:mm:ss')
}

moment.prototype.isPast = function () {
  return this.isBefore(moment(), 'day')
}

moment.prototype.isFuture = function () {
  return this.isAfter(moment(), 'day')
}

export default moment
